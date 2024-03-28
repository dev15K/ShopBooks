@extends('admin.layouts.master')
@section('title')
    List Order
@endsection
@section('content')
    <div class="pagetitle">
        <h1>List Order</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                <li class="breadcrumb-item active">List Order</li>
            </ol>
        </nav>
    </div>

    <div class="container-fluid">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Full Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Address</th>
                <th scope="col">Total Price</th>
                <th scope="col">Order Method</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{ $order->full_name }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->address }}</td>
                    <td>${{ $order->total }}</td>
                    <td>{{ $order->order_method }}</td>
                    <td>{{ $order->status }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('admin.orders.detail', $order->id) }}" class="btn btn-success">
                                <i class="bi bi-eye"></i>
                            </a>
                            @if($order->status != \App\Enums\OrderStatus::DELETED)
                                <form method="post" action="{{ route('admin.orders.delete', $order->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
