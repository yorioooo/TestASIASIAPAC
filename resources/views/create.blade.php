<!DOCTYPE html>
<html>
<head>
    <title>Tambah Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Tambah Karyawan</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nomor" class="form-label">Nomor</label>
                <input type="text" name="nomor" id="nomor" class="form-control" value="{{ old('nomor') }}" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}" required>
            </div>
            <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan</label>
                <input type="text" name="jabatan" id="jabatan" class="form-control" value="{{ old('jabatan') }}">
            </div>
            <div class="mb-3">
                <label for="talahir" class="form-label">Tanggal Lahir</label>
                <input type="date" name="talahir" id="talahir" class="form-control" value="{{ old('talahir') }}">
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Foto</label>
                <input type="file" name="photo" id="photo" class="form-control" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('employees.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>