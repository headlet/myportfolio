@extends('layout.admin')

@section('body')
<div class="container mt-5">
    <div class="card shadow-lg rounded-3">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Edit Roles for {{ $user->fullname }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('update.role', $user) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-bold">Full Name</label>
                    <input type="text" class="form-control" value="{{ $user->fullname }}" disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Email</label>
                    <input type="email" class="form-control" value="{{ $user->email }}" disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Roles</label>
                    <div class="d-flex flex-wrap gap-2">
                        @foreach($roles as $role)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="roles[]" value="{{ $role->id }}"
                                id="role{{ $role->id }}"
                                {{ $user->roles->contains($role->id) ? 'checked' : '' }}>
                            <label class="form-check-label" for="role{{ $role->id }}">
                                {{ $role->Role }}
                            </label>
                        </div>
                        @endforeach
                    </div>
                    @error('roles')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('user_role') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-success">Update Roles</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
