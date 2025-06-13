<!DOCTYPE html>
<html>
<head>
    <title>Edit Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Edit Karyawan</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('employees.update', $employee->nomor) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nomor" class="form-label">Nomor</label>
                <input type="text" name="nomor" id="nomor" class="form-control" value="{{ $employee->nomor }}" readonly>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ $employee->nama }}" required>
            </div>
            <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan</label>
                <input type="text" name="jabatan" id="jabatan" class="form-control" value="{{ $employee->jabatan }}">
            </div>
            <div class="mb-3">
                <label for="talahir" class="form-label">Tanggal Lahir</label>
                <input type="date" name="talahir" id="talahir" class="form-control" value="{{ $employee->talahir ? $employee->talahir->format('Y-m-d') : '' }}">
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Foto</label>
                <input type="file" name="photo" id="photo" class="form-control" accept="image/*">
                @if ($employee->photo_upload_path)
                    <img src="{{ $employee->photo_upload_path }}" width="100" alt="Foto Saat Ini">
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('employees.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>