@extends('admin.layouts.master')
@section('title')
    Detail User
@endsection
@section('content')
    <div class="pagetitle">
        <h1>Detail User</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                <li class="breadcrumb-item active">Detail User</li>
            </ol>
        </nav>
    </div>

    <div class="container-fluid">
        <form method="post" action="{{ route('admin.users.update', $user->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="full_name">FullName</label>
                <input type="text" class="form-control" id="full_name" name="full_name" value="{{ $user->full_name }}"
                       required>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}"
                       required>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}"
                           required>
                </div>
                <div class="form-group col-md-6">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}"
                           required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-group col-md-6">
                    <label for="re_password">Re-Password</label>
                    <input type="password" class="form-control" id="re_password" name="re_password">
                </div>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}"
                       required>
            </div>
            <div class="form-group">
                <label for="about">About</label>
                <textarea class="form-control" id="about" name="about" rows="5">{{ $user->about }}</textarea>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="avatar">Avatar</label>
                    <input type="file" class="form-control" id="avatar" name="avatar">
                    <img class="mt-3" src="{{ asset($user->avt) }}" alt="" width="100px">
                </div>
                <div class="form-group col-md-6">
                    <label for="status">Status</label>
                    <select id="status" class="form-select" name="status">
                        <option
                            {{ $user->status == \App\Enums\UserStatus::ACTIVE ? 'selected' : '' }}
                            value="{{ \App\Enums\UserStatus::ACTIVE }}">
                            {{ \App\Enums\UserStatus::ACTIVE }}
                        </option>
                        <option {{ $user->status == \App\Enums\UserStatus::INACTIVE ? 'selected' : '' }}
                                value="{{ \App\Enums\UserStatus::INACTIVE }}">
                            {{ \App\Enums\UserStatus::INACTIVE }}
                        </option>
                        <option
                            {{ $user->status == \App\Enums\UserStatus::BLOCKED ? 'selected' : '' }}
                            value="{{ \App\Enums\UserStatus::BLOCKED }}">
                            {{ \App\Enums\UserStatus::BLOCKED }}
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
