@extends('admin.layouts.master')
@section('title')
    List Product
@endsection
@section('content')
    <div class="pagetitle">
        <h1>List Product</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                <li class="breadcrumb-item active">List Product</li>
            </ol>
        </nav>
    </div>

    <div class="container-fluid">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Thumbnail</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td> {{ $product->name }}</td>
                    <td>
                        <img src="{{ asset($product->thumbnail) }}" alt="" width="100px" height="100px">
                    </td>
                    <td>
                        {{ $product->price }}
                    </td>
                    <td>
                        {{ $product->quantity }}
                    </td>
                    <td> {{ $product->status }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('admin.products.detail', $product->id) }}" class="btn btn-warning"><i
                                    class="bi bi-eye"></i></a>
                            <form action="{{ route('admin.products.delete', $product->id) }}" method="post">
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
        {{ $products->links('pagination::bootstrap-5') }}
    </div>
@endsection
