<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Post Form</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">

  <div class="container" style="width: 50vw;">
    <div class="card shadow-lg rounded-3">
      <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Create New Post</h5>
      </div>
      <div class="card-body">
        <form action="{{ route('posts.store') }}" method="POST">
          @csrf

          <!-- User Select -->
          <div class="mb-3">
            <label class="form-label fw-semibold">Select User</label>
            <select name="user_id" class="form-select" required>
              <option value="">-- Choose User --</option>
              @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
              @endforeach
            </select>
          </div>

          <!-- Title -->
          <div class="mb-3">
            <label class="form-label fw-semibold">Title</label>
            <input type="text" name="title" class="form-control" placeholder="Enter post title" required>
          </div>

          <!-- Content -->
          <div class="mb-3">
            <label class="form-label fw-semibold">Content</label>
            <textarea name="content" class="form-control" rows="4" placeholder="Enter post content" required></textarea>
          </div>

          <!-- Buttons -->
          <div class="d-flex justify-content-end">
            <button type="reset" class="btn btn-outline-secondary me-2">Clear</button>
            <button type="submit" class="btn btn-success">Save Post</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</body>
</html>
