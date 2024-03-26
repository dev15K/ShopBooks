@extends('admin.layouts.master')
@section('title')
    Detail Product
@endsection
@section('content')
    <div class="pagetitle">
        <h1>Detail Product</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                <li class="breadcrumb-item active">Detail Product</li>
            </ol>
        </nav>
    </div>

    <div class="container-fluid">
        <form method="post" action="{{ route('admin.products.update', $product->id) }}"
              enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required value="{{ $product->name }}">
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="quantity">Quantity</label>
                    <input type="number" min="1" class="form-control" id="quantity" name="quantity" required
                           value="{{ $product->quantity }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="price">Price</label>
                    <input type="number" min="0" class="form-control" id="price" name="price" required
                           value="{{ $product->price }}">
                </div>
            </div>
            <div class="form-group">
                <label for="short_description">Short Description</label>
                <textarea class="form-control" id="short_description" rows="5" name="short_description"
                          required>{{ $product->short_description }}</textarea>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="5"
                          required>{{ $product->description }}</textarea>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="thumbnail">Thumbnail</label>
                    <input type="file" class="form-control" id="thumbnail" name="thumbnail">
                    <img class="mt-3" src="{{ asset($product->thumbnail) }}" alt="" width="100px">
                </div>
                <div class="form-group col-md-6">
                    <label for="gallery">Gallery</label>
                    <input type="file" class="form-control" id="gallery" name="gallery[]" multiple>
                    @php
                        $gallery = $product->gallery;
                        $arrayGallery = explode(',', $gallery);
                    @endphp
                    @foreach($arrayGallery as $item)
                        <img class="mt-3 mr-3" src="{{ asset($item) }}" alt="" width="100px">
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="category_id">Category</label>
                    <select id="category_id" class="form-select" name="category_id">
                        @foreach($categories as $category)
                            <option
                                {{ $category->id == $product->category_id ? 'selected' : '' }}
                                value="{{ $category->id }}"> {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="status">Status</label>
                    <select id="status" class="form-select" name="status">
                        <option
                            {{ $product->status == \App\Enums\ProductStatus::ACTIVE ? 'selected' : '' }}
                            value="{{ \App\Enums\ProductStatus::ACTIVE }}">
                            {{ \App\Enums\ProductStatus::ACTIVE }}
                        </option>
                        <option
                            {{ $product->status == \App\Enums\ProductStatus::INACTIVE ? 'selected' : '' }}
                            value="{{ \App\Enums\ProductStatus::INACTIVE }}">
                            {{ \App\Enums\ProductStatus::INACTIVE }}
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
