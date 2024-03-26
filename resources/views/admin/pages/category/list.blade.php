@extends('admin.layouts.master')
@section('title')
    List Category
@endsection
@section('content')
    <div class="pagetitle">
        <h1>List Category</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                <li class="breadcrumb-item active">List Category</li>
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
                <th scope="col">Parent</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td> {{ $category->name }}</td>
                    <td>
                        <img src="{{ asset($category->thumbnail) }}" alt="" width="100px" height="100px">
                    </td>
                    <td>
                        @if($category->parent_id)
                            @php
                                $category_parent = \App\Models\Category::find($category->parent_id);
                            @endphp
                            {{ $category_parent->name }}
                        @else
                            <p class="text-secondary">No parent</p>
                        @endif
                    </td>
                    <td> {{ $category->status }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('admin.categories.detail', $category->id) }}" class="btn btn-warning"><i class="bi bi-eye"></i></a>
                            <form action="{{ route('admin.categories.delete', $category->id) }}" method="post">
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
        {{ $categories->links('pagination::bootstrap-5') }}
    </div>
@endsection
