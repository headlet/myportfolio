@Extends('layout.admin')

@section('body')
<h1>User Roles</h1>
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
    <div>
 <a href="" class="btn btn-success mt-3">
            + Add Role to User
        </a>
</div><br>

<table class="table table-striped table-bordered align-middle">
    <thead class="table-dark">
        <tr>

            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th style="width: 190px;">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>

            <td>{{ $user->fullname }}</td>
            <td>{{ $user->email }}</td>

           
            <td>
                {{ $user->roles->pluck('Role')->implode(', ') }}
            </td>


            <td>
                <a href="{{route('edit.role', $user)}}" class="btn btn-primary btn-sm me-1">
                    <i class="bi bi-pencil"></i> Edit
                </a>
                {{--<?php if (in_array("Admin", $_SESSION['user']['user_roles'] ?? [])): ?>--}}
                <a class="btn btn-danger btn-sm" onclick="return deleteUser()">
                    <i class="bi bi-trash"></i> Delete
                </a>
                {{-- <?php endif; ?>--}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script src="/../collab-training/public/js/deleteUser.js"></script>
@endsection