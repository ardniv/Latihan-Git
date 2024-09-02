<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<body>
<div class="container mt-4">
<h1>Edit Profile</h1>
<form action="{{route('updateprof')}}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    @method('PUT')

                    <!-- <div style="display: flex; justify-content: center;">
                    <div class="rounded-circle mb-3" style="width: 150px; height: 150px; background-color: #f0f0f0; display: flex; justify-content: center; align-items: center; font-size: 72px; color: #000;">
                        {{ substr(Auth::user()->nama, 0, 1) }}
                    </div>
                    </div> -->

                    <div style="display: flex; justify-content: center;">
                        <div class="rounded-circle mb-3" style="width: 150px; height: 150px; background-color: #f0f0f0; display: flex; justify-content: center; align-items: center;">
                            @if($user->img)
                                <img src="{{ asset('storage/' . $user->img) }}" alt="User Image" class="img-fluid rounded-circle" style="width: 100%; height: 100%; object-fit: cover;">
                            @else
                                <span style="font-size: 72px; color: #000;">
                                    {{ substr($user->nama, 0, 1) }}
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3">
                        <input type="text" name="nama" id="nama" class="form-control" required value="{{ Auth::user()->nama }}">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                    </div>
                    
                    <div class="mb-3">
                        <input type="text" name="email" id="email" class="form-control" required value="{{ Auth::user()->email }}">
                        <label for="email" class="form-label">Email</label>
                    </div>
                    
                    <div class="mb-3">
                        <input type="password" name="password" id="password" class="form-control"  >
                        <label for="password" class="form-label">Password</label>
                    </div>

                    <div class="mb-3">
                        <input class="form-control" type="file" id="img" name="img">
                        <label for="img" class="form-label">Change Profile</label>
                    </div>

                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <a href="indexUser" class="btn btn-secondary">Kembali</a>
               </form>
 </div>

 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if($message = Session::get('success'))
<script>
    Swal.fire({
    position: "center",
    icon: "success",
    title: "{{$message}}",
    showConfirmButton: false,
    timer: 1500
    });
</script>
@endif

@if($message = Session::get('error'))
<script>
    Swal.fire({
    position: "center",
    icon: "error",
    title: "{{$message}}",
    showConfirmButton: false,
    timer: 1500
    });
@endif
</script>

 </body>
</html> 