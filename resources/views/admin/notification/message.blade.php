@extends('layout.admin.admin')

@section('body')
<section>
    <p class="text-xl font-bold">All Message</p>
    <div class="mt-6 overflow-x-auto border border-gray-200 bg-white shadow-lg rounded-xl">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-50 text-gray-700 border-b border-gray-200">
                <tr>
                    <th class="py-3 px-5">Full Name</th>
                    <th class="py-3 px-5">Email</th>
                    <th class="py-3 px-5">Phone</th>
                    <th class="py-3 px-5">Message</th>
                    <th class="py-3 px-5">Time</th>
                    <th class="py-3 px-5">Action</th>
                </tr>
            </thead>
            @foreach($contacts as $contact)
            <tr>
                <td class="py-3 px-5">{{ $contact->fname . ' ' . $contact->lname }}</td>
                <td class="py-3 px-5">{{$contact->email }}</td>
                <td class="py-3 px-5">{{$contact->phone }}</td>
                <td class="py-3 px-5">{{$contact->message }}</td>
                <td class="py-3 px-5">{{$contact->created_at }}</td>

                <td class="py-3 px-5">
                    <button data-id="{{ $contact->id }}" data-url="" class="flex-1 px-2 py-2 bg-red-600 text-white rounded-lg shadow hover:bg-red-700 transition text-center delete-btn">
                        Delete
                    </button>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</section>

@endsection