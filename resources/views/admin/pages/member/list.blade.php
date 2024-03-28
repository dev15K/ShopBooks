@extends('admin.layouts.master')
@section('title')
    List Member
@endsection
@section('content')
    <div class="pagetitle">
        <h1>List Member</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                <li class="breadcrumb-item active">List Member</li>
            </ol>
        </nav>
    </div>

    <div class="container-fluid">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Avt</th>
                <th scope="col">Name</th>
                <th scope="col">Position</th>
                <th scope="col">Priority</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($members as $member)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>
                        <img src="{{ asset($member->avt) }}" alt="" width="100px" height="100px">
                    </td>
                    <td> {{ $member->name }} </td>
                    <td>
                        {{ $member->position }}
                    </td>
                    <td> {{ $member->stt }}</td>
                    <td> {{ $member->status }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('admin.members.detail', $member->id) }}" class="btn btn-warning"><i class="bi bi-eye"></i></a>
                            <form action="{{ route('admin.members.delete', $member->id) }}" method="post">
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
        {{ $members->links('pagination::bootstrap-5') }}
    </div>
@endsection
