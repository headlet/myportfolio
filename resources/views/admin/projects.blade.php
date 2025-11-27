@extends('layout.admin.admin')
@section('body')

<div class="max-w-7xl mx-auto px-4 mt-10">

    <!-- Page Title + Add Button -->
    <div class="flex flex-wrap items-center justify-between gap-3 mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Projects</h1>

        <a href="{{ route('projects.create') }}"
            class="px-3 py-2 bg-blue-600 text-white rounded-xl shadow hover:bg-blue-700 transition">
            + Insert Project
        </a>
    </div>

    <!-- Search -->
    <form action="{{ route('project') }}" method="GET"
        class="mb-6 flex flex-wrap gap-3">
        <input type="text" name="search"
            class="w-full sm:w-60 px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none bg-gray-50"
            placeholder="Search projects..." value="{{ request('search') }}">

        <button type="submit"
            class="px-4 py-2 bg-blue-600 text-white rounded-xl shadow hover:bg-blue-700 transition">
            Search
        </button>
    </form>

    <!-- Projects Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6">
        @foreach ($datas as $data)
        <div class="bg-white rounded-xl shadow-md hover:shadow-xl border border-gray-200 
                    overflow-hidden flex flex-col transition duration-200">

            <!-- Image -->
            <div class="w-full h-48 md:h-56 lg:h-52 xl:h-48 overflow-hidden">
                <img src="{{ asset('storage/' . $data->image) }}" alt="Project Image"
                    class="w-full h-full object-cover hover:scale-105 transition duration-300">
            </div>

            <!-- Content -->
            <div class="p-3 flex flex-col justify-between gap-3 flex-1">

                <div>
                    <h2 class="text-lg md:text-xl font-semibold text-gray-800 mb-2 truncate">
                        {{ $data->name }}
                    </h2>

                    <p class="text-gray-600 text-sm line-clamp-3">
                        {{ $data->description }}
                    </p>

                    <!-- Status + Github -->
                    <div class="flex items-center gap-2 mt-3 flex-wrap">
                        <span class="px-3 py-1 rounded-lg text-sm
                            @if($data->status == 'completed') bg-green-100 text-green-700
                            @elseif($data->status == 'ongoing') bg-yellow-100 text-yellow-700
                            @else bg-gray-100 text-gray-700 @endif">
                            {{ ucfirst($data->status) }}
                        </span>

                        @if($data->source)
                        <a href="{{ $data->source }}" target="_blank"
                            class="text-blue-600 text-sm hover:underline">
                            Github
                        </a>
                        @endif
                    </div>

                    <!-- Dates -->
                    <div class="text-gray-500 text-xs sm:text-sm mt-1">
                        <p>Start: {{ $data->start_date }}</p>
                        <p>End: {{ $data->end_date }}</p>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="mt-1 flex flex-wrap gap-2">
                    <a href="{{ route('projects.edit', $data->id) }}"
                        class="flex-1 px-3 py-2 bg-green-600 text-white rounded-lg text-center hover:bg-green-700 transition">
                        Edit
                    </a>

                    <button data-id="{{ $data->id }}"
                        class="flex-1 px-3 py-2 bg-red-600 text-white rounded-lg text-center hover:bg-red-700 transition delete-btn">
                        Delete
                    </button>
                </div>

            </div>
        </div>
        @endforeach
    </div>

</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        $(".delete-btn").click(function() {
            let id = $(this).data("id");
            const card = $(this).closest("div.bg-white");

            Swal.fire({
                title: "Delete this project?",
                text: "This action cannot be undone!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#2563eb",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "/projects/" + id,
                        type: "DELETE",
                        data: {
                            _token: "{{ csrf_token() }}"
                        },

                        success: function(response) {
                            if (response.status === "success") {
                                Swal.fire("Deleted!", response.message, "success");
                                card.fadeOut(300, function() {
                                    $(this).remove();
                                });
                            } else {
                                Swal.fire("Error", "Something went wrong.", "error");
                            }
                        },

                        error: function() {
                            Swal.fire("Error", "Server error occurred.", "error");
                        }
                    });
                }
            });
        });
    });
</script>

@endsection
