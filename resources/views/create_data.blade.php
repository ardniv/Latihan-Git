<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
<h1>Register Mahasiswa</h1>
<form action="{{ url('store') }}" method="POST">
    @csrf
    <div class="mb-3">
         <label for="nrp" class="form-label">NRP</label>
         <input type="text" name="nrp" id="nrp" class="form-control">
         @error('nrp')
            <small class="text-danger">{{ $message }}</small>
         @enderror
    </div>
    <div class="mb-3">
         <label for="nama" class="form-label">Nama Lengkap</label>
         <input type="text" name="nama" id="nama" class="form-control">
         @error('nama')
            <small class="text-danger">{{ $message }}</small>
         @enderror
    </div>
         <div class="mb-3">
         <label for="jurusan" class="form-label">Jurusan</label>
         <input type="text" name="jurusan" id="jurusan" class="form-control">
         @error('jurusan')
            <small class="text-danger">{{ $message }}</small>
         @enderror
     </div>
     <div class="mb-3">
	     <label for="email" class="form-label">Email</label>
         <input type="text" name="email" id="email" class="form-control">
         @error('email')
            <small class="text-danger">{{ $message }}</small>
         @enderror
     </div>
     <button type="submit" class="btn btn-primary">Tambah Data</button>
     <a href="{{ url('/index') }}" class="btn btn-secondary">Kembali</a>
 </form>
 </div>
 </body>
</html> 
  