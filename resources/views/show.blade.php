<!DOCTYPE html>
<html>
<head>
    <title>Detail Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Detail Karyawan</h1>
        <div class="card">
            <div class="card-body">
                <p><strong>Nomor:</strong> {{ $employee->nomor }}</p>
                <p><strong>Nama:</strong> {{ $employee->nama }}</p>
                <p><strong>Jabatan:</strong> {{ $employee->jabatan ?? '-' }}</p>
                <p><strong>Tanggal Lahir:</strong> {{ $employee->talahir ? $employee->talahir->format('Y-m-d') : '-' }}</p>
                <p><strong>Foto:</strong>
                    @if ($employee->photo_upload_path)
                        <img src="{{ $employee->photo_upload_path }}" width="100" alt="Foto">
                    @else
                        -
                    @endif
                </p>
                <p><strong>Dibuat Pada:</strong> {{ $employee->created_on ? $employee->created_on->format('Y-m-d H:i:s') : '-' }}</p>
                <p><strong>Diperbarui Pada:</strong> {{ $employee->updated_on ? $employee->updated_on->format('Y-m-d H:i:s') : '-' }}</p>
            </div>
        </div>
        <a href="{{ route('employees.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
</body>
</html>