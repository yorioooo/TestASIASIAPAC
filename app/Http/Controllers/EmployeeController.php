<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Model
{
    protected $table = 'employee'; // Tentukan nama tabel secara eksplisit
    protected $primaryKey = 'id'; // Pastikan primary key adalah 'id'
    public $timestamps = true; // Gunakan created_at dan updated_at dari Laravel

    protected $fillable = [
        'nomor', 'nama', 'jabatan', 'talahir', 'photo_upload_path',
        'created_on', 'updated_on', 'created_by', 'updated_by', 'deleted_on'
    ];

    protected $dates = ['talahir', 'created_on', 'updated_on'];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($employee) {
            self::updateRedisCache($employee);
        });

        static::updated(function ($employee) {
            self::updateRedisCache($employee);
        });

        static::deleted(function ($employee) {
            if ($employee->photo_upload_path) {
                $path = parse_url($employee->photo_upload_path, PHP_URL_PATH);
                Storage::disk('public')->delete(ltrim($path, '/storage/'));
            }
            Redis::del("emp_{$employee->nomor}");
        });
    }

    public static function updateRedisCache($employee)
    {
        Redis::set("emp_{$employee->nomor}", $employee->toJson());
    }

    public function uploadPhoto($file)
    {
        $path = $file->store('employee-photos', 'public');
        $this->photo_upload_path = Storage::url($path);
        $this->save();
        self::updateRedisCache($this);
    }
}