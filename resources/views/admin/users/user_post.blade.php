@extends('admin')
@section('content')
    <h1 class="mb-4">Users and their Posts</h1>

    <table class="table table-striped table-bordered align-middle">
        <thead class="table-dark">
            <tr>
                <th>User Name</th>
                <th>Email</th>
                <th>Posts</th>
            </tr>
        </thead>
        <tbody>
            @foreach($upost as $user)
                <tr>
                    <td>{{ $user->fullname }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <ul>
                            @forelse($user->posts as $post)
                                <li><strong>{{ $post->title }}</strong> - {{ $post->content }}</li>
                            @empty
                                <li>No posts</li>
                            @endforelse
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
  <a href="{{ url('/post_create') }}"
    class="{{ request()->is('post_create') ? 'active' : '' }}">
    Create Post
  </a>
@endsection