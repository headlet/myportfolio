@extends('layout.admin.admin')

@section('body')
<section>
    <p class="">All Message</p>
    <div>
        <table>
            <tr>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Message</th>
                <th>Time</th>
                <th>Action</th>
            </tr>
            @foreach($contacts as $contact)
            <tr>
                <td>{{ $contact->fname . ' ' . $contact->lname }}</td>
                <td>{{$contact->email }}</td>
                <td>{{$contact->phone }}</td>
                <td>{{$contact->message }}</td>
                <td>{{$contact->created_at }}</td>

                <td><button data-id="{{ $contact->id }}"
                    class="flex-1 px-2 py-2 bg-red-600 text-white rounded-lg shadow hover:bg-red-700 transition text-center delete-btn">
                    Delete
                </button></td>
            </tr>


            @endforeach
        </table>
    </div>
</section>

@endsection