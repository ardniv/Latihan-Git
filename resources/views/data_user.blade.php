@extends('dashlayout.app')

@section('content')
    <div class="container mt-1">
        <h1>Data User</h1>
        <a href="#insertModal" class="btn btn-primary mb-3" data-bs-toggle="modal">Tambah Data</a>
        
        <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengguna as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                        <button type="button" class="btn btn-primary me-1" onclick="openModalForm(<?=htmlentities(json_encode($user))?>)">Edit</button>

                        <button type="button" class="btn btn-danger me-1" onclick="confirmDelete({{ $user->id }})">Delete</button>
                        <form id="delete-form-{{ $user->id }}" action="{{ route('die', ['id' => $user->id]) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                        </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Create Modal -->
        <div class="modal fade" id="insertModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <form action="{{route('add')}}" method="POST">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Create Data</h1>
            </div>
            <div class="modal-body">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" name="create-nama" id="create-nama" class="form-control" required>
                @error('nama')
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
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="create-password" id="create-password" class="form-control" required>
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <input type="text" name="create-role" id="create-role" class="form-control" required>
                @error('role')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
            </form>
            </div>
        </div>
        </div>

        <!-- Edit Modal -->
        <div class="modal fade" id="updateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <form action="{{route('baru')}}" method="POST">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit User</h1>
            </div>
            <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="id" class="form-label">ID</label>
                        <input type="number" name="edit-id" id="edit-id" class="form-control" readonly >
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" name="edit-nama" id="edit-nama" class="form-control" required>
                        @error('nama')
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
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <input type="text" name="edit-role" id="edit-role" class="form-control" required>
                        @error('role')
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
        $('#edit-id').val(data.id);
        $('#edit-nama').val(data.nama);
        $('#edit-email').val(data.email);
        $('#edit-role').val(data.role);
        $('#updateModal').modal('show');
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
    })
    .then((result) => {
    if (result.isConfirmed) {
        document.getElementById('delete-form-' + id).submit()
        // Swal.fire({
        // title: "Deleted!",
        // text: "Your file has been deleted.",
        // icon: "success"
        // });
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
