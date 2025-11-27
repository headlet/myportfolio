@extends('layout.admin.admin')
@section('body')

<section id='edit_content'>

    <!-- Header -->
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-semibold text-gray-900">Skills</h1>

        <a href="{{ route('skills.create') }}"
            class="inline-flex items-center bg-blue-600 text-white px-5 py-2.5 rounded-xl shadow hover:bg-blue-700 transition">
            + New Skill
        </a>
    </div>

    <!-- Search Bar -->
    <form action="" class="mb-6">
        <input type="text" name="search"
            class="w-full md:w-1/3 px-4 py-2.5 rounded-xl border border-gray-300 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-500 transition"
            placeholder="Search skills...">
    </form>

    <!-- Skills Card Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        @foreach ($data as $value)
        <div class="bg-white rounded-xl shadow border border-gray-200 p-5 hover:shadow-lg transition flex flex-col">

            <!-- Skill Header -->
            <div class="flex justify-between items-start mb-3">
                <h2 class="text-xl font-semibold text-gray-800 skillname">{{ $value->skill_name }}</h2>
                <span class="px-3 py-1 text-sm rounded-lg bg-gray-100 text-gray-700 skillcategory">
                    {{ $value->skill_category }}
                </span>
            </div>

            <!-- Skill Level -->
            <p class="text-gray-600 text-sm mb-3">
                <strong>Level:</strong> 
                <span class="skilllevel">{{ $value->skill_level }}</span>
            </p>

            <!-- Dates -->
            <div class="text-gray-500 text-xs mt-auto">
                <p>Created: {{ $value->created_at->diffForHumans() }}</p>
                <p>Updated: {{ $value->updated_at->diffForHumans() }}</p>
            </div>

            <!-- Action Buttons -->
            <div class="mt-4 flex gap-2">
                <button
                    class="flex-1 px-3 py-2 text-sm bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition views"
                    data-val="{{ $value->id }}">
                    Edit
                </button>

                <button
                    data-id="{{ $value->id }}"
                    data-url="{{ route('skills.delete', $value->id) }}"
                    class="delete-btn flex-1 px-3 py-2 text-sm bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                    Delete
                </button>
            </div>

        </div>
        @endforeach

    </div>

</section>

<!-- Edit Form (Popup Page) -->
<div id="edit-form-container" class="hidden px-4">
    <form id="edit-form" enctype="multipart/form-data" method="POST" action=""
        class="max-w-lg mx-auto bg-white p-6 rounded-xl shadow border border-gray-200">
        @csrf
        @method('PUT')

        <h2 class="text-2xl font-semibold mb-4">Edit Skill</h2>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Skill Name</label>
            <input type="text" name="skill_name" id="edit-skill-name"
                class="w-full border px-3 py-2 rounded-lg">
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Skill Level</label>
            <input type="text" name="level" id="edit-level"
                class="w-full border px-3 py-2 rounded-lg">
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Skill Category</label>
            <input type="text" name="category" id="edit-category"
                class="w-full border px-3 py-2 rounded-lg">
        </div>

        <div class="flex gap-3 mt-6">
            <button type="submit"
                class="flex-1 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Update Skill
            </button>

            <button type="button"
                class="close-btn flex-1 px-4 py-2 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400">
                Cancel
            </button>
        </div>

    </form>
</div>

<!-- SweetAlert + jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$(document).ready(function() {

    /* DELETE */
    $(".delete-btn").click(function() {
        let id = $(this).data("id");
        let url = $(this).data("url");
        const card = $(this).closest("div.bg-white");

        Swal.fire({
            title: "Delete this skill?",
            text: "This action cannot be undone.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#2563eb",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete"
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
                            card.fadeOut(300);
                        } else {
                            Swal.fire("Error", response.message, "error");
                        }
                    },

                    error: function(xhr) {
                        Swal.fire("Error", "Something went wrong!", "error");
                    }
                });
            }
        });
    });


    /* EDIT POPUP */
    $('.views').click(function() {

        $('#edit_content').addClass('hidden');
        $('#edit-form-container').removeClass('hidden');

        let id = $(this).data('val');
        let card = $(this).closest('.bg-white');

        // Extract values
        $('#edit-skill-name').val(card.find('.skillname').text().trim());
        $('#edit-level').val(card.find('.skilllevel').text().trim());
        $('#edit-category').val(card.find('.skillcategory').text().trim());

        // Update form action
        $('#edit-form').attr('action', '/skills/edit/' + id);
    });


    /* CLOSE FORM */
    $('.close-btn').click(function() {
        $('#edit_content').removeClass('hidden');
        $('#edit-form-container').addClass('hidden');
    });

});
</script>

@endsection
