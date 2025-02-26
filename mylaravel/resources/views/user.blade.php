<!-- filepath: /c:/xampp/htdocs/88823665-camp-66/mylaravel/resources/views/user.blade.php -->
@extends('layouts.default_with_menu')

@section('content')
<div class="row">
    <div class="col-md-12">

      {{-- <div class="alert alert-info">
          <strong>คุณเข้าสู่ระบบเป็น:</strong> {{ Auth::user()->name }} ({{ Auth::user()->email }})
      </div> --}}

      <div class="card mb-12">
        <div class="card-header"><h3 class="card-title">รายชื่อผู้ใช้</h3></div>
        <!-- /.card-header -->
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th>Name</th>
                <th>Email</th>
                <th style="width: 240px"></th>
              </tr>
            </thead>
            <tbody>
             @foreach ($users as $index => $user)
              <tr id="user-row-{{ $user->id }}" class="align-middle">
                <td>{{ $index+1 }}.</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn btn-warning">Edit</a>
                    <button class="btn btn-danger" onclick="confirmDelete({{ $user->id }})">Delete</button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
          <ul class="pagination pagination-sm m-0 float-end">
            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
          </ul>
        </div>

      </div>
      <!-- /.card -->
    </div>
</div>

<!-- Include SweetAlert library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
function confirmDelete(userId) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger"
        },
        buttonsStyling: false
    });

    swalWithBootstrapButtons.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(`{{ url('/users/delete') }}/${userId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }).then(response => {
                if (response.ok) {
                    document.getElementById(`user-row-${userId}`).remove();
                    swalWithBootstrapButtons.fire(
                        'Deleted!',
                        'User has been deleted.',
                        'success'
                    );
                } else {
                    swalWithBootstrapButtons.fire(
                        'Failed!',
                        'Failed to delete user.',
                        'error'
                    );
                }
            });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your imaginary file is safe :)',
                'error'
            );
        }
    });
}
</script>

@endsection
