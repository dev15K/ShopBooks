@extends('admin.layouts.master')
@section('title')
    List Contact
@endsection
@section('content')
    <div class="pagetitle">
        <h1>List Contact</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                <li class="breadcrumb-item active">List Contact</li>
            </ol>
        </nav>
    </div>

    <div class="container-fluid">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Subject</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($contacts as $contact)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td> {{ $contact->first_name }} </td>
                    <td>
                        {{ $contact->last_name }}
                    </td>
                    <td>
                        {{ $contact->email }}
                    </td>
                    <td> {{ $contact->subject }}</td>
                    <td> {{ $contact->status }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('admin.contacts.detail', $contact->id) }}" class="btn btn-warning"><i class="bi bi-eye"></i></a>
                            <form action="{{ route('admin.contacts.delete', $contact->id) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $contacts->links('pagination::bootstrap-5') }}
    </div>
@endsection
