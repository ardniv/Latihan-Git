@extends('layout.app')

@section('content')
        <h1>Data Mahasiswa</h1>
        <!-- <a href="#createModal" class="btn btn-primary mb-3" data-bs-toggle="modal">Tambah Data</a> -->
        
        <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>NRP</th>
                    <th>Nama Lengkap</th>
                    <th>Jurusan</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswa as $mhs)
                    <tr>
                        <td>{{ $mhs->nrp }}</td>
                        <td>{{ $mhs->nama }}</td>
                        <td>{{ $mhs->jurusan }}</td>
                        <td>{{ $mhs->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
<script>
    let table = new DataTable('#myTable');
</script>
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

@endsection
