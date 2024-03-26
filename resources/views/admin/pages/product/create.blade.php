@extends('admin.layouts.master')
@section('title')
    Create Products
@endsection
@section('content')
    <div class="pagetitle">
        <h1>Create Products</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                <li class="breadcrumb-item active">Create Products</li>
            </ol>
        </nav>
    </div>

    <div class="container-fluid">
        <form method="post" action="{{ route('admin.products.create') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="quantity">Quantity</label>
                    <input type="number" min="1" class="form-control" id="quantity" name="quantity" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="price">Price</label>
                    <input type="number" min="0" class="form-control" id="price" name="price" required>
                </div>
            </div>
            <div class="form-group">
                <label for="short_description">Short Description</label>
                <textarea class="form-control" id="short_description" rows="5" name="short_description" required></textarea>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="thumbnail">Thumbnail</label>
                    <input type="file" class="form-control" id="thumbnail" name="thumbnail" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="gallery">Gallery</label>
                    <input type="file" class="form-control" id="gallery" name="gallery[]" multiple required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="category_id">Category</label>
                    <select id="category_id" class="form-select" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"> {{ $category->name }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="status">Status</label>
                    <select id="status" class="form-select" name="status">
                        <option value="{{ \App\Enums\ProductStatus::ACTIVE }}" selected>
                            Choose...
                        </option>
                        <option value="{{ \App\Enums\ProductStatus::ACTIVE }}">
                            {{ \App\Enums\ProductStatus::ACTIVE }}
                        </option>
                        <option value="{{ \App\Enums\ProductStatus::INACTIVE }}">
                            {{ \App\Enums\ProductStatus::INACTIVE }}
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
