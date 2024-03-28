@extends('admin.layouts.master')
@section('title')
    Create User
@endsection
@section('content')
    <div class="pagetitle">
        <h1>Create User</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                <li class="breadcrumb-item active">Create User</li>
            </ol>
        </nav>
    </div>

    <div class="container-fluid">
        <form method="post" action="{{ route('admin.users.create') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="full_name">FullName</label>
                <input type="text" class="form-control" id="full_name" name="full_name" required>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="re_password">Re-Password</label>
                    <input type="password" class="form-control" id="re_password" name="re_password" required>
                </div>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <div class="form-group">
                <label for="about">About</label>
                <textarea class="form-control" id="about" name="about" rows="5"></textarea>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="avatar">Avatar</label>
                    <input type="file" class="form-control" id="avatar" name="avatar" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="status">Status</label>
                    <select id="status" class="form-select" name="status">
                        <option value="{{ \App\Enums\UserStatus::ACTIVE }}" selected>
                            Choose...
                        </option>
                        <option value="{{ \App\Enums\UserStatus::ACTIVE }}">
                            {{ \App\Enums\UserStatus::ACTIVE }}
                        </option>
                        <option value="{{ \App\Enums\UserStatus::INACTIVE }}">
                            {{ \App\Enums\UserStatus::INACTIVE }}
                        </option>
                        <option value="{{ \App\Enums\UserStatus::BLOCKED }}">
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
