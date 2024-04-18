@extends('admin.layouts.master')
@section('title')
    List Category
@endsection
@section('content')
    <div class="pagetitle">
        <h1>List Revenue</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                <li class="breadcrumb-item active">List Revenue</li>
            </ol>
        </nav>
    </div>

    <div class="container-fluid">
        <table class="table ">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Total</th>
                <th scope="col">Datetime</th>
            </tr>
            </thead>
            <tbody>
            @foreach($revenues as $revenue)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td> {{ $revenue->total }}</td>
                    <td> {{ $revenue->datetime }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $revenues->links('pagination::bootstrap-5') }}
    </div>
@endsection
