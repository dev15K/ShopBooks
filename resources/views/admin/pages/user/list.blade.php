@extends('admin.layouts.master')
@section('title')
    List User
@endsection
@section('content')
    <div class="pagetitle">
        <h1>List User</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                <li class="breadcrumb-item active">List User</li>
            </ol>
        </nav>
    </div>

    <div class="container-fluid">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Avt</th>
                <th scope="col">FullName</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">PhoneNumber</th>
                <th scope="col">Address</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>
                        <img src="{{ asset($user->avt) }}" alt="" width="100px" height="100px">
                    </td>
                    <td> {{ $user->full_name }} </td>
                    <td>
                        {{ $user->username }}
                    </td>
                    <td> {{ $user->email }}</td>
                    <td> {{ $user->phone }}</td>
                    <td> {{ $user->address }}</td>
                    <td> {{ $user->status }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('admin.users.detail', $user->id) }}" class="btn btn-warning"><i class="bi bi-eye"></i></a>
                            <form action="{{ route('admin.users.delete', $user->id) }}" method="post">
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
        {{ $users->links('pagination::bootstrap-5') }}
    </div>
@endsection
