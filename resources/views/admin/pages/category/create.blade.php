@extends('admin.layouts.master')
@section('title')
    Create Category
@endsection
@section('content')
    <div class="pagetitle">
        <h1>Create Category</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                <li class="breadcrumb-item active">Create Category</li>
            </ol>
        </nav>
    </div>

    <div class="container-fluid">
        <form method="post" action="{{ route('admin.categories.create') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="parent_id">Parent</label>
                    <select id="parent_id" class="form-select" name="parent_id">
                        <option value="" selected>
                            Choose...
                        </option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"> {{ $category->name }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="thumbnail">Thumbnail</label>
                    <input type="file" class="form-control" id="thumbnail" name="thumbnail" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="status">Status</label>
                    <select id="status" class="form-select" name="status">
                        <option value="{{ \App\Enums\CategoryStatus::ACTIVE }}" selected>
                            Choose...
                        </option>
                        <option value="{{ \App\Enums\CategoryStatus::ACTIVE }}">
                            {{ \App\Enums\CategoryStatus::ACTIVE }}
                        </option>
                        <option value="{{ \App\Enums\CategoryStatus::INACTIVE }}">
                            {{ \App\Enums\CategoryStatus::INACTIVE }}
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
