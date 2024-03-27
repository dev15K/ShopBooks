@extends('ui.layouts.master')
@section('title')
    List Products
@endsection
@section('content')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="{{ route('home') }}">Home</a>
                    <span class="mx-2 mb-0">/</span>
                    <strong class="text-black">Category</strong>
                </div>
            </div>
        </div>
    </div>

    @include('ui.pages.widget.list-products')
@endsection
