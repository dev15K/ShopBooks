@extends('admin.layouts.master')
@section('title')
    Detail Member
@endsection
@section('content')
    <div class="pagetitle">
        <h1>Detail Member</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                <li class="breadcrumb-item active">Detail Member</li>
            </ol>
        </nav>
    </div>

    <div class="container-fluid">
        <form method="post" action="{{ route('admin.members.update', $member->id) }}"
              enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $member->name }}" required>
            </div>
            <div class="form-group">
                <label for="position">Position</label>
                <input type="text" class="form-control" id="position" name="position" value="{{ $member->position }}"
                       required>
            </div>
            <div class="form-group">
                <label for="about">About</label>
                <textarea class="form-control" id="about" name="about" rows="5" required>{{ $member->about }}</textarea>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="stt">Priority</label>
                    <input type="number" min="1" class="form-control" id="stt" name="stt" value="{{ $member->stt }}"
                           required>
                </div>
                <div class="form-group col-md-4">
                    <label for="avatar">Avatar</label>
                    <input type="file" class="form-control" id="avatar" name="avatar">
                    <img class="mt-3" src="{{ asset($member->avt) }}" alt="" width="100px">
                </div>
                <div class="form-group col-md-4">
                    <label for="status">Status</label>
                    <select id="status" class="form-select" name="status">
                        <option {{ $member->status == \App\Enums\MemberStatus::ACTIVE ? 'selected' : '' }}
                                value="{{ \App\Enums\MemberStatus::ACTIVE }}">
                            {{ \App\Enums\MemberStatus::ACTIVE }}
                        </option>
                        <option {{ $member->status == \App\Enums\MemberStatus::INACTIVE ? 'selected' : '' }}
                                value="{{ \App\Enums\MemberStatus::INACTIVE }}">
                            {{ \App\Enums\MemberStatus::INACTIVE }}
                        </option>
                    </select>
                </div>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary ">Save</button>
            </div>
        </form>
    </div>
@endsection
