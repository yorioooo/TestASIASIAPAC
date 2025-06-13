<!DOCTYPE html>
<html>
<head>
    <title>Daftar Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Daftar Karyawan</h1>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">Tambah Karyawan</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Tanggal Lahir</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $employee->nomor }}</td>
                        <td>{{ $employee->nama }}</td>
                        <td>{{ $employee->jabatan }}</td>
                        <td>{{ $employee->talahir ? $employee->talahir->format('Y-m-d') : '-' }}</td>
                        <td>
                            @if ($employee->photo_upload_path)
                                <img src="{{ $employee->photo_upload_path }}" width="50" alt="Foto">
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('employees.show', $employee->nomor) }}" class="btn btn-info btn-sm">Lihat</a>
                            <a href="{{ route('employees.edit', $employee->nomor) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('employees.destroy', $employee->nomor) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus karyawan?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>