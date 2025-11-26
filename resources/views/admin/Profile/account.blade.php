@extends('layout.admin.admin')

@section('body')
<div class="max-w-4xl mx-auto p-6 bg-white rounded-2xl shadow-lg">
    <h2 class="text-2xl font-semibold mb-6">Account Settings</h2>

    <form action="{{route('userupdate', $user->id)}}" enctype="multipart/form-data" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @csrf
        @method('put')
        <!-- Profile Picture -->
        <div class="flex flex-col items-center md:col-span-2">
            <img src="{{asset('storage/'. $user->profile_picture)}}" alt="Profile Picture" class="w-32 h-32 rounded-full object-cover mb-4 border border-gray-300">
            <label class="block text-gray-700 font-medium mb-1" for="profile_picture">Profile Picture</label>
            <input type="file" id="profile_picture" name="profile_picture" class="border border-gray-300 rounded px-3 py-2 w-full md:w-64" accept="image/*">
            <span class="text-red-500 text-sm mt-1 hidden error-section"></span>
        </div>

        <!-- Full Name -->
        <div class="form-group">
            <label class="block text-gray-700 font-medium mb-1" for="fullname">First Name</label>
            <input type="text" id="fullname" name="first_name" class="border border-gray-300 rounded px-3 py-2 w-full focus:ring-2 focus:ring-blue-400"
                value="{{ old('first_name', $user->first_name) }}" placeholder="Enter your First name">
            <span class="text-red-500 text-sm mt-1 hidden error-section"></span>
        </div>

        <div class="form-group">
            <label class="block text-gray-700 font-medium mb-1" for="fullname">Last Name</label>
            <input type="text" id="lastname" name="last_name" class="border border-gray-300 rounded px-3 py-2 w-full focus:ring-2 focus:ring-blue-400"
                value="{{ old('last_name', $user->last_name) }}" placeholder="Enter your last name">
            <span class="text-red-500 text-sm mt-1 hidden error-section"></span>
        </div>

        <!-- Username -->
        <div class="form-group">
            <label class="block text-gray-700 font-medium mb-1" for="username">Username</label>
            <input type="text" id="username" name="username" class="border border-gray-300 rounded px-3 py-2 w-full focus:ring-2 focus:ring-blue-400"
                value="{{ old('username', $user->username) }}" placeholder="Enter your username">
            <span class="text-red-500 text-sm mt-1 hidden error-section"></span>
        </div>

        <!-- Password
                <div class="form-group">
                    <label class="block text-gray-700 font-medium mb-1" for="password">Password</label>
                    <input type="password" id="password" name="password" class="border border-gray-300 rounded px-3 py-2 w-full focus:ring-2 focus:ring-blue-400"
                     placeholder="Enter your password">
                    <span class="text-red-500 text-sm mt-1 hidden error-section"></span>
                </div> -->

        <!-- Email -->
        <div class="form-group">
            <label class="block text-gray-700 font-medium mb-1" for="email">Email Address</label>
            <input type="email" id="email" name="email" class="border border-gray-300 rounded px-3 py-2 w-full focus:ring-2 focus:ring-blue-400"
                placeholder="Enter your email" value="{{ old('email', $user->email) }}">
            <span class="text-red-500 text-sm mt-1 hidden error-section"></span>
        </div>

        <!-- Introduction -->
        <div class="md:col-span-2">
            <label class="block text-gray-700 font-medium mb-1" for="introduction">Introduction</label>
            <textarea name="introduction" id="introduction" rows="3" class="border border-gray-300 rounded px-3 py-2 w-full focus:ring-2 focus:ring-blue-400" placeholder="Write a short introduction...">{{ old('introduction', $user->introduction) }}</textarea>
        </div>

        <!-- Description -->
        <div class="md:col-span-2">
            <label class="block text-gray-700 font-medium mb-1" for="description">Description</label>
            <textarea name="description" id="description" rows="5" class="border border-gray-300 rounded px-3 py-2 w-full focus:ring-2 focus:ring-blue-400" placeholder="Write a detailed description...">{{ old('description', $user->description) }}</textarea>
        </div>

        <!-- Social Links -->
        <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-gray-700 font-medium mb-1" for="github">GitHub</label>
                <input type="text" id="github" name="github" class="border border-gray-300 rounded px-3 py-2 w-full focus:ring-2 focus:ring-blue-400" value="{{old('github', $user->github)}}">
            </div>
            <div>
                <label class="block text-gray-700 font-medium mb-1" for="linkedin">LinkedIn</label>
                <input type="text" id="linkedin" name="linkedin" class="border border-gray-300 rounded px-3 py-2 w-full focus:ring-2 focus:ring-blue-400" value="{{old('linkedin', $user->linkedin)}}">
            </div>
            <div>
                <label class="block text-gray-700 font-medium mb-1" for="facebook">Facebook</label>
                <input type="text" id="facebook" name="facebook" class="border border-gray-300 rounded px-3 py-2 w-full focus:ring-2 focus:ring-blue-400" value="{{old('facebook', $user->facebook)}}">
            </div>

            
        </div>


        <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-gray-700 font-medium mb-1" for="Feature">Feature Project</label>
                <select name="project" id="Feature">
                    @foreach($project as $projects)
                    <option value="{{$projects->id}}" >{{$projects->name}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-gray-700 font-medium mb-1" for="Experience">Experience</label>
                <input type="text" id="Experience" name="experience" class="border border-gray-300 rounded px-3 py-2 w-full focus:ring-2 focus:ring-blue-400" value="{{old('experience', $user->experience)}}">
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1" for="location">Location</label>
                <input type="text" id="location" name="location" class="border border-gray-300 rounded px-3 py-2 w-full focus:ring-2 focus:ring-blue-400" value="{{old('location', $user->location)}}">
            </div>
        </div>



        <!-- Submit Button -->
        <div class="md:col-span-2 mt-4">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">Save Changes</button>
        </div>
    </form>
</div>
@endsection