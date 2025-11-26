@extends('layout.admin.admin')
@section('body')
<h1 class="font-bold text-lg mb-2">Edit {{ $edit->name }}'s data</h1>
<form action="{{ route('projects.update', $edit) }}" enctype="multipart/form-data" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Project Name:</label>
        <input type="text" class="form-control" name="name" value="{{ old('name', $edit->name) }}">
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Project Description:</label>
        <input type="text" class="form-control" name="description"
            value="{{ old('description', $edit->description) }}">
    </div>
    {{-- Source Link--}}
    <div>
        <label for="source" class="block font-medium text-gray-700">Source link</label>
        <input type="text"
            name="source"
            id="source"
            value="{{ old('source', $edit->source)  }}"
            class="mt-1 w-full border border-gray-300 px-4 py-2 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
            placeholder="Enter project source">
    </div>

    {{-- Live --}}
    <div>
        <label for="live" class="block font-medium text-gray-700">Project live</label>
        <input type="text"
            name="live"
            id="live"
            value="{{ old('live', $edit->live)  }}"
            class="mt-1 w-full border border-gray-300 px-4 py-2 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
            placeholder="Enter project live link">
    </div>


    <div class="mb-3">
        <label for="status" class="form-label">Project Status:</label>
        <select name="status" id="status" class="form-control">
            <option value="">{{ old('status', $edit->status) }}</option>
            @foreach (\App\Models\Project::statuses as $status)
            <option value="{{ $status }}" {{ old('status', $edit->status) == $status ? 'selected' : '' }}>
                {{ ucfirst($status) }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="start_date" class="form-label">Project start date:</label>
        <input type="date" class="form-control" name="start_date" value="{{ old('start_date', $edit->start_date) }}">
    </div>

    <div class="mb-3">
        <label for="end_date" class="form-label">Project end date:</label>
        <input type="date" class="form-control" name="end_date" value="{{ old('end_date', $edit->end_date) }}">
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Project Image:</label>
        <input type="file" class="form-control" name="image">

        @if ($edit->image)
        <div class="mt-2">
            <img src="{{ asset('Storage/' . $edit->image) }}" alt="Current Image" width="120">
        </div>
        @endif
    </div>


    <button class="btn btn-success">Update</button>
</form>
@endsection