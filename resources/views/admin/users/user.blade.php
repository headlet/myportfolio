@extends('layout.admin.admin')

@section('body')
<h1>Users</h1>
@if(session('success'))
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1080">
    <div class="toast align-items-center text-bg-success border-0 show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="3000">
        <div class="d-flex">
            <div class="toast-body">
                {{ session('success') }}
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>
@endif
<div class="mb-3 d-flex" style="width: 350px;">
    <input type="text" id="search" class="form-control me-2" placeholder="Search users...">
    <button id="user-search-btn" class="btn btn-primary">Search</button>
</div>

<table class="table table-striped table-bordered align-middle" id="user_table">

    <thead class="table-dark">
        <tr>

            <th id="fullname-header" style="cursor:pointer; white-space: nowrap;">

                Full Name
                <i class="bi bi-arrow-down-up ms-1" style="font-size: 0.9rem;"></i>

            </th>


            <th>Usename</th>
            <th>Email</th>
            <th>Gender</th>
            <th style="width: 200px;">Action</th>
        </tr>
    </thead>
    <tbody id="user-table-body">
        @if($users->count() > 0)
        @foreach($users as $user)
        @dd($user);
        <tr>
            <input type="hidden" name="ids[]" value="{{ $user->id }}">

            <td>{{ $user->fullname }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->gender }}</td>
            <td>
                <a href="" class="btn btn-primary btn-sm me-1">Edit</a>
                <a href="{{ route('user.view', $user) }}" class="btn btn-info btn-sm me-1">View</a>
                <a href="#" class="btn btn-danger btn-sm delete-user" data-id="{{ $user->id }}" data-bs-toggle="modal" data-bs-target="#userDeleteModal">
                    <i class="bi bi-trash"></i> Delete
                </a>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="6" class="text-center">No users found.</td>
        </tr>
        @endif
    </tbody>

</table>
<!-- pagination -->
<div>
    {{ $users->links() }}
</div>

<div class="modal fade" id="userDeleteModal" tabindex="-1" aria-labelledby="userDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="userDeleteModalLabel">User Delete</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Do you want to delete?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" id="confirm-delete">Delete</button>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(function() {
        let deleteUrlTemplate = "{{ route('user.destroy', ':id') }}";
        let userid;
        let userrow;

        // When delete button clicked
        $('.delete-user').on("click", function() {
            userid = $(this).data("id");
            userrow = $(this).closest("tr");
        });

        // When confirm delete clicked
        $("#confirm-delete").on("click", function() {
            $.ajax({
                url: deleteUrlTemplate.replace(':id', userid),
                type: "POST",
                data: {
                    _method: 'DELETE',
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (response.success) {
                        userrow.remove();
                        $('#userDeleteModal').modal('hide'); // ✅ correct
                        Swal.fire(
                            'Deleted!',
                            'User has been deleted.',
                            'success'
                        );
                    }
                },
                error: function() {
                    $('#userDeleteModal').modal('hide');
                    Swal.fire(
                        'Error!',
                        'Something went wrong on the server.',
                        'error'
                    );
                }
            });
        });
    });
</script>

<!-- search -->
<script>
    $(function() {
        $('#search').on('keyup', function() {
            let query = $(this).val();

            $.ajax({
                url: "{{ route('user.search') }}",
                type: 'GET',
                data: {
                    query: query
                },
                success: function(users) {
                    let rows = "";
                    if (users.length > 0) {
                        users.forEach(function(user) {
                            rows += `
                    <tr>
                        <td>${user.fullname}</td>
                        <td>${user.username}</td>
                        <td>${user.email}</td>
                        <td>${user.gender}</td>
                        <td>
                            <a href="/admin/users/${user.id}/edit" class="btn btn-sm btn-primary me-1">Edit</a>
                            <a href="/admin/users/${user.id}" class="btn btn-sm btn-info me-1">View</a>
                            <a href="#" class="btn btn-danger btn-sm delete-user" data-id="${user.id}" data-bs-toggle="modal" data-bs-target="#userDeleteModal">Delete</a>
                        </td>
                    </tr>
                `;
                        });
                    } else {
                        rows = `<tr><td colspan="5" class="text-center">No users found.</td></tr>`;
                    }
                    $("#user-table-body").html(rows);
                }
            });

        });


    });
</script>

<!-- sorting -->
<script>
    $(function() {
        let sortOrder = '{{ $sortOrder }}';

        $('#fullname-header').on('click', function() {
            // toggle sort order
            sortOrder = (sortOrder === 'asc') ? 'desc' : 'asc';

            // reload page with new sort parameter
            let url = new URL(window.location.href);
            url.searchParams.set('sort', sortOrder);
            window.location.href = url.toString();
        });
    });
</script>

@endsection