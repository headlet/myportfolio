@extends('layout.admin.admin')

@section('body')

<div class="max-w-2xl mx-auto mt-10 p-8 bg-white rounded-2xl shadow-lg">
    <h2 class="text-2xl font-semibold text-gray-900 mb-6">Add New Skill</h2>

    @if($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="#" method="POST" class="space-y-4">
        @csrf
        <!-- Skill Name -->
        <div>
            <label for="skill_name" class="block text-gray-700 font-medium mb-1">Skill Name</label>
            <input type="text" id="skill_name" name="skill_name" 
                   value="{{ old('skill_name') }}"
                   placeholder="Enter the skill name"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>

        <!-- Skill Category -->
        <div>
            <label for="skill_category" class="block text-gray-700 font-medium mb-1">Skill Category</label>
            <input type="text" name="skill_category" id="skill_category" placeholder="Enter the skill"  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>

        <!-- Skill Level -->
        <div>
            <label for="skill_level" class="block text-gray-700 font-medium mb-1">Skill Description</label>
            <input type="text" name="skill_level"  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Enter Skill description">
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit" 
                    class="w-full md:w-1/2 bg-green-600 text-white font-semibold px-6 py-2 rounded-xl shadow hover:bg-green-700 transition">
                Add New Skill
            </button>
        </div>
    </form>
</div>

@endsection
