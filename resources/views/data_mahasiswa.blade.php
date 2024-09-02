@extends('dashlayout.app')

@section('content')
    <div class="container mt-1">
        <h1>Data Mahasiswa</h1>
        <a href="#createModal" class="btn btn-primary mb-3" data-bs-toggle="modal">Tambah Data</a>
        
        <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>NRP</th>
                    <th>Nama Lengkap</th>
                    <th>Jurusan</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $mhs)
                    <tr>
                        <td>{{ $mhs['nrp'] }}</td>
                        <td>{{ $mhs['nama'] }}</td>
                        <td>{{ $mhs['jurusan'] }}</td>
                        <td>{{ $mhs['email'] }}</td>
                        <td>
                        <div class="d-flex justify-content-start">    
                        <button type="button" class="btn btn-primary me-1" onclick="openModalForm(<?=htmlentities(json_encode($mhs))?>)">Edit</button>
                        
                        <button type="button" class="btn btn-danger me-1" onclick="confirmDelete({{ $mhs['nrp'] }})">Delete</button>
                        <form id="delete-form-{{ $mhs['nrp'] }}" action="{{ route('delete', ['nrp' => $mhs['nrp']]) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                        </form>

                        </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Edit Modal -->
        <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <form action="{{ route('update') }}" method="POST">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data</h1>
            </div>
            <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nrp" class="form-label">NRP</label>
                        <input type="number" name="edit-nrp" id="edit-nrp" class="form-control" readonly >
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" name="edit-nama" id="edit-nama" class="form-control" required>
                        @error('nama')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jurusan" class="form-label">Jurusan</label>
                        <input type="text" name="edit-jurusan" id="edit-jurusan" class="form-control" required>
                        @error('jurusan')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="edit-email" id="edit-email" class="form-control" required>
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
            </div>
        </div>
        </div>

        <!-- Create Modal -->
        <div class="modal fade" id="createModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <form action="{{ route('store') }}" method="POST">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Create Data</h1>
            </div>
            <div class="modal-body">
            @csrf
            <div class="mb-3">
                <label for="nrp" class="form-label">NRP</label>
                <input type="number" name="create-nrp" id="create-nrp" class="form-control" required>
                @error('nrp')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" name="create-nama" id="create-nama" class="form-control" required>
                @error('nama')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
                <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <input type="text" name="create-jurusan" id="create-jurusan" class="form-control" required>
                @error('jurusan')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="create-email" id="create-email" class="form-control" required>
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
    </form>
            </div>
        </div>
        </div>
    </div>
<script>
    let table = new DataTable('#myTable');
    
    function openModalForm(data){
        // var data = JSON.parse(viewData);
        $('#edit-nrp').val(data.nrp);
        $('#edit-nama').val(data.nama);
        $('#edit-jurusan').val(data.jurusan);
        $('#edit-email').val(data.email);
        $('#editModal').modal('show');
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function confirmDelete(id){
    // event.preventDefult();
    // const from = event.target;
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
    if (result.isConfirmed) {
        document.getElementById('delete-form-' + id).submit()
        Swal.fire({
        title: "Deleted!",
        text: "Your file has been deleted.",
        icon: "success"
        });
    }
    });
}

</script>
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
