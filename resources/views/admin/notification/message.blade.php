@extends('layout.admin.admin')

@section('body')

<section>
    <h1 class="text-3xl font-bold mb-6 text-gray-900">All Messages</h1>

    <!-- Messages Card Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        @foreach ($contacts as $contact)
        <div class="bg-white p-3 rounded-xl shadow border border-gray-200 hover:shadow-lg transition flex flex-col">

            <!-- Name -->
            <h2 class="text-xl font-semibold text-gray-800 mb-1">
                {{ $contact->fname }} {{ $contact->lname }}
            </h2>

            <!-- Email -->
            <p class="text-gray-600 text-sm">
                <strong>Email:</strong> {{ $contact->email }}
            </p>

            <!-- Phone -->
            <p class="text-gray-600 text-sm mt-1">
                <strong>Phone:</strong> {{ $contact->phone }}
            </p>

            <!-- Message -->
            <p class="text-gray-700 text-sm mt-3">
                <strong>Message:</strong><br>
                {{ $contact->message }}
            </p>

            <!-- Time -->
            <p class="text-gray-500 text-xs mt-4">
                {{ $contact->created_at->diffForHumans() }}
            </p>

            <!-- Actions -->
            <div class="mt-4">
                <button data-id="$contact->id " data-url=" route('contacts.delete', $contact->id) "
                    class="delete-btn px-3 py-2 text-sm bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                    Delete
                </button>
            </div>

        </div>
        @endforeach

    </div>
</section>

<!-- SweetAlert + jQuery (delete logic) -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- <script>
$(document).ready(function() {

    $(".delete-btn").click(function() {
        let id = $(this).data("id");
        let url = $(this).data("url");
        let card = $(this).closest('div.bg-white');

        Swal.fire({
            title: "Delete this message?",
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
                    data: { _token: "{{ csrf_token() }}" },

                    success: function(response) {
                        if (response.status === "success") {
                            Swal.fire("Deleted!", "Message removed.", "success");
                            card.fadeOut(300);
                        } else {
                            Swal.fire("Error", response.message, "error");
                        }
                    },
                    error: function() {
                        Swal.fire("Error", "Something went wrong!", "error");
                    }
                });

            }
        });

    });

});
</script> -->

@endsection
