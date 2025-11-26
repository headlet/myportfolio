@extends('layout.admin.admin')

@section('body')

<div class="max-w-3xl mx-auto mt-10 bg-white shadow-lg rounded-xl p-8">

    <h1 class="text-3xl font-bold text-gray-800 mb-6">Create New Project</h1>

    <form action="/projects/create" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        {{-- Error Messages --}}
        @if ($errors->any())
            <div class="p-4 bg-red-100 text-red-800 rounded-lg">
                <ul class="list-disc ml-6">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Project Name --}}
        <div>
            <label for="name" class="block font-medium text-gray-700">Project Name</label>
            <input type="text" 
                name="name" 
                id="name" 
                value="{{ old('name') }}"
                class="mt-1 w-full border border-gray-300 px-4 py-2 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                placeholder="Enter project name">
        </div>

        {{-- Description --}}
        <div>
            <label for="description" class="block font-medium text-gray-700">Project Description</label>
            <input type="text" 
                name="description" 
                id="description" 
                value="{{ old('description') }}"
                class="mt-1 w-full border border-gray-300 px-4 py-2 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                placeholder="Enter project details">
        </div>
        
        {{-- Source Link--}}
        <div>
            <label for="source" class="block font-medium text-gray-700">Source link</label>
            <input type="text" 
                name="source" 
                id="source" 
                value="{{ old('source') }}"
                class="mt-1 w-full border border-gray-300 px-4 py-2 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                placeholder="Enter project source">
        </div>

        {{-- Live --}}
        <div>
            <label for="live" class="block font-medium text-gray-700">Project live</label>
            <input type="text" 
                name="live" 
                id="live" 
                value="{{ old('live') }}"
                class="mt-1 w-full border border-gray-300 px-4 py-2 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                placeholder="Enter project live link">
        </div>

        {{-- Start Date --}}
        <div>
            <label for="start_date" class="block font-medium text-gray-700">Start Date</label>
            <input type="date" 
                name="start_date" 
                id="start_date"
                value="{{ old('start_date') }}"
                class="mt-1 w-full border border-gray-300 px-4 py-2 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>

        {{-- End Date --}}
        <div>
            <label for="end_date" class="block font-medium text-gray-700">End Date</label>
            <input type="date" 
                name="end_date" 
                id="end_date"
                value="{{ old('end_date') }}"
                class="mt-1 w-full border border-gray-300 px-4 py-2 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>

        {{-- Project Status --}}
        <div>
            <label for="status" class="block font-medium text-gray-700">Project Status</label>
            <select 
                name="status" 
                id="status"
                class="mt-1 w-full border border-gray-300 px-4 py-2 rounded-lg bg-white focus:ring-2 focus:ring-blue-500 focus:outline-none">
                <option value="">Select the project status</option>
                @foreach(\App\Models\Project::statuses as $status)
                    <option value="{{ $status }}">{{ ucfirst($status) }}</option>
                @endforeach
            </select>
        </div>

        {{-- Image Upload --}}
        <div>
            <label for="project_image" class="block font-medium text-gray-700">Project Image</label>
            <input type="file" 
                accept="image/*" 
                name="image"
                id="project_image"
                class="mt-1 w-full border border-gray-300 px-4 py-2 rounded-lg bg-white focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>

        {{-- Submit Button --}}
        <button 
            type="submit" 
            class="w-full py-3 bg-blue-600 text-white rounded-lg text-md font-semibold hover:bg-blue-700 transition">
            Add New Project
        </button>

    </form>

</div>

@endsection
