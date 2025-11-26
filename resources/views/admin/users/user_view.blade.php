<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Details</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body class="bg-light">

  <div class="container mt-5 d-flex justify-content-center">
    <div class="card shadow-lg border-0 rounded-4" style="max-width: 600px; width: 100%; min-height: 500px;">

      <!-- Header -->
      <div class="card-header text-white d-flex justify-content-between align-items-center rounded-top-4" style="background: linear-gradient(90deg, #4e54c8, #8f94fb);">
        <h4 class="mb-0"><i class="bi bi-person-circle me-2"></i>User Details</h4>
        <a href="{{ route('user') }}" class="btn btn-light btn-sm shadow-sm">
          <i class="bi bi-arrow-left"></i> Back
        </a>
      </div>

      <!-- Profile Section -->
      <div class="card-body p-5 text-center">
        @if($user->profile_picture)
          <img src="{{ asset('storage/' . $user->profile_picture) }}" 
               class="rounded-circle shadow-lg mb-4" 
               alt="Profile Picture" 
               width="120" height="120" style="object-fit: cover;">
        @else
          <i class="bi bi-person-circle text-secondary mb-4" style="font-size: 120px;"></i>
        @endif

        <h5 class="fw-bold">{{ $user->fullname }}</h5>
        <p class="text-muted mb-4">{{ '@' . $user->username }}</p>

        <!-- Centered User Info -->
        <p class="mb-2"><span class="fw-semibold text-secondary me-1">Email:</span> {{ $user->email }}</p>
        <p class="mb-2"><span class="fw-semibold text-secondary me-1">Phone:</span> {{ $user->phone_number }}</p>
        <p class="mb-0"><span class="fw-semibold text-secondary me-1">Gender:</span> {{ $user->gender ?? 'N/A' }}</p>
      </div>

      <!-- Footer -->
      <div class="card-footer text-end bg-light rounded-bottom-4">
        <a href="{{ route('edit.user', $user) }}" class="btn btn-warning shadow-sm">
          <i class="bi bi-pencil-square"></i> Edit
        </a>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
