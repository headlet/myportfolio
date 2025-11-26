@extends('layout.admin.admin')

@section('body')
<section id='edit_content'>
    <!-- Page Header -->
    <div class="flex items-center justify-between mb-8 ">
        <h1 class="text-3xl font-semibold text-gray-900">Skills</h1>

        <a href="{{ route('skills.create') }}"
            class="inline-flex items-center bg-blue-600 text-white px-5 py-2.5 rounded-xl shadow hover:bg-blue-700 transition">
            + New Skill
        </a>
    </div>

    <!-- Search Bar -->
    <form action="" class="mb-6">
        <input type="text"
            name="search"
            class="w-full md:w-1/3 px-4 py-2.5 rounded-xl border border-gray-300 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-500 transition"
            placeholder="Search skills...">
    </form>

    <!-- Table Container -->
    <div class="mt-6 overflow-x-auto border border-gray-200 bg-white shadow-lg rounded-xl">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-50 text-gray-700 border-b border-gray-200">
                <tr class="text-sm font-semibold">
                    <th class="py-3 px-5">Skill Name</th>
                    <th class="py-3 px-5">Category</th>
                    <th class="py-3 px-5">Level</th>
                    <th class="py-3 px-5">Created</th>
                    <th class="py-3 px-5">Updated</th>
                    <th class="py-3 px-5 text-center">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($data as $value)
                <tr class="border-b hover:bg-gray-50 transition">
                    <td class="py-4 px-5 skillname">{{ $value->skill_name }}</td>
                    <td class="py-4 px-5 skillcategory">{{ $value->skill_category }}</td>
                    <td class="py-4 px-5 skilllevel">{{ $value->skill_level }}</td>

                    <td class="py-4 px-5 text-gray-500 text-sm">{{ $value->created_at->diffForHumans() }}</td>
                    <td class="py-4 px-5 text-gray-500 text-sm">{{ $value->updated_at->diffForHumans() }}</td>

                    <td class="py-4 px-5 text-center flex justify-center gap-2">

                        <!-- View -->
                        <button
                            class="px-3 py-1.5 text-sm bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition shadow-sm views" data-val='{{$value->id}}'>
                            Edit
                        </button>

                        <!-- Delete -->
                        <button data-id="{{ $value->id }}" data-url="{{route('skills.delete', $value->id)}}"
                            class="delete-btn px-3 py-1.5 text-sm bg-red-600 text-white rounded-lg hover:bg-red-700 transition shadow-sm">
                            Delete
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>


<!-- //edit -->
<div id="edit-form-container" class="hidden ">

    <form id="edit-form" enctype="multipart/form-data" method="POST" action="">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="skill_name" class="form-label">Skill Name</label>
            <input type="text" name="skill_name" id="edit-skill-name" class="form-control" value="">
        </div>

        <div class="mb-3">
            <label for="level" class="form-label">Skill Level:</label>
            <input type="text" name="level" id="edit-level" class="form-control" value="{{old('level')}}">
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Skill category:</label>
            <input type="text" name="category" class="form-control" id="edit-category" value="{{old('category')}}">
        </div>

        <button type="submit" class="px-3 py-1.5 text-sm bg-blue-600 text-white rounded-lg hover:bg-green-700 transition shadow-sm">Update Skill</button>
        <a href="" class="close-btn px-3 py-1.5 text-sm bg-red-600 text-white rounded-lg hover:bg-green-700 transition shadow-sm">Close Skill</a>
    </form>


</div>

<!-- SweetAlert + jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        $(".delete-btn").click(function() {
            let id = $(this).data("id");
            let url = $(this).data('url');
            const row = $(this).closest("tr");

            Swal.fire({
                title: "Delete this skill?",
                text: "This action cannot be undone.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#2563eb",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it"
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        url: url,
                        type: "DELETE",
                        data: {
                            _token: "{{ csrf_token() }}"
                        },

                        success: function(response) {
                            if (response.status === "success") {
                                Swal.fire("Deleted!", "Skill removed.", "success");
                                row.fadeOut(300);
                            } else {
                                Swal.fire("Error", response.message, "error");
                            }
                        },
                        error: function(xhr) {
                            let message = xhr.responseJSON?.message || "Something went wrong!";

                            Swal.fire("Error", res.message, "error");
                            console.error(xhr.responseText);
                        }
                    });

                }
            });
        });

    });


    $('.views').click(function() {
        $('#edit-form-container').toggleClass('hidden');
        $('#edit_content').toggleClass('hidden');

        let id = $(this).data('val');

        // Get values from the table row
        let row = $(this).closest('tr');
        let skillName = row.find('.skillname').text().trim();
        let skillCategory = row.find('.skillcategory').text().trim();
        let skillLevel = row.find('.skilllevel').text().trim();

        // Fill form fields
        $('#edit-skill-name').val(skillName);
        $('#edit-level').val(skillLevel);
        $('#edit-category').val(skillCategory);

        // Set form action
        $('#edit-form').attr('action', '/skills/edit/' + id);
    });

    $('.close-btn').click(function() {
        $('#edit-form-container').toggleClass('hidden');
        $('#edit_content').toggleClass('hidden');
    })
</script>

@endsection