@extends('admin.layouts.master')
@section('title')
    Create Member
@endsection
@section('content')
    <div class="pagetitle">
        <h1>Create Member</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                <li class="breadcrumb-item active">Create Member</li>
            </ol>
        </nav>
    </div>

    <div class="container-fluid">
        <form method="post" action="{{ route('admin.members.create') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="position">Position</label>
                <input type="text" class="form-control" id="position" name="position" required>
            </div>
            <div class="form-group">
                <label for="about">About</label>
                <textarea class="form-control" id="about" name="about" rows="5"></textarea>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="stt">Priority</label>
                    <input type="number" min="1" class="form-control" id="stt" name="stt" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="avatar">Avatar</label>
                    <input type="file" class="form-control" id="avatar" name="avatar" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="status">Status</label>
                    <select id="status" class="form-select" name="status">
                        <option value="{{ \App\Enums\MemberStatus::ACTIVE }}" selected>
                            Choose...
                        </option>
                        <option value="{{ \App\Enums\MemberStatus::ACTIVE }}">
                            {{ \App\Enums\MemberStatus::ACTIVE }}
                        </option>
                        <option value="{{ \App\Enums\MemberStatus::INACTIVE }}">
                            {{ \App\Enums\MemberStatus::INACTIVE }}
                        </option>
                    </select>
                </div>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary ">Create</button>
            </div>
        </form>
    </div>
@endsection
