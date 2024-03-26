@extends('admin.layouts.master')
@section('title')
    Detail Category
@endsection
@section('content')
    <div class="pagetitle">
        <h1>Detail Category</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                <li class="breadcrumb-item active">Detail Category</li>
            </ol>
        </nav>
    </div>

    <div class="container-fluid">
        <form method="post" action="{{ route('admin.categories.update', $category->id) }}"
              enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}"
                       required>
            </div>
            <div class="row">
                <div class="form-group col-md-3">
                    <label for="parent_id">Parent</label>
                    <select id="parent_id" class="form-select" name="parent_id">
                        <option value="" {{ isset($category->parent_id) ? '' : 'selected' }}>
                            Choose...
                        </option>
                        @foreach($categories as $category_parent)
                            <option {{ $category->parent_id == $category_parent->id ? 'selected' : ''}}
                                    value="{{ $category_parent->id }}">
                                {{ $category_parent->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="thumbnail">Thumbnail</label>
                    <input type="file" class="form-control" id="thumbnail" name="thumbnail">
                    <img class="mt-3" src="{{ asset($category->thumbnail) }}" alt="" width="100px">
                </div>
                <div class="form-group col-md-3">
                    <label for="status">Status</label>
                    <select id="status" class="form-select" name="status">
                        <option {{ $category->status == \App\Enums\CategoryStatus::ACTIVE ? 'selected' : '' }}
                                value="{{ \App\Enums\CategoryStatus::ACTIVE }}">
                            {{ \App\Enums\CategoryStatus::ACTIVE }}
                        </option>
                        <option {{ $category->status == \App\Enums\CategoryStatus::INACTIVE ? 'selected' : '' }}
                                value="{{ \App\Enums\CategoryStatus::INACTIVE }}">
                            {{ \App\Enums\CategoryStatus::INACTIVE }}
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
