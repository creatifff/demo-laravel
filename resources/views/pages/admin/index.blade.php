@extends('layout.layout')

@section('page_title', 'Admin Panel')

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="section__title">Admin Panel</h1>

            <div class="blocks">
                <div class="block">
                    <h2 class="block__title">Products</h2>

                    <div class="table">
                        <div>
                            <div class="table-item">
                                <span>ID</span>
                                <span>Name</span>
                                <span>Price</span>
                                <span>Actions</span>
                            </div>

                            @foreach($products as $product)
                                <div class="table-item">
                                    <span>{{ $product->id }}</span>
                                    <span>{{ $product->name }}</span>
                                    <span>{{ $product->money() }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="block">
                    <h2 class="block__title">Collection</h2>
                    <div class="table-item">
                        <span>ID</span>
                        <span>Name</span>
                        <span>Products</span>
                        <span>Actions</span>
                    </div>

                    @foreach($collections as $collection)
                        <div class="table-item">
                            <span>{{ $collection->id }}</span>
                            <span>{{ $collection->name }}</span>
                            <span>{{ $collection->products()->count() }}</span>
                            <span>
                                <a href="">Edit</a>
                                <a href="">Remove</a>
                            </span>
                        </div>
                    @endforeach
                </div>

                <div class="block">
                    <h2 class="block__title">Orders</h2>
                    <div class="table-item">
                        <span>ID</span>
                        <span>Name</span>
                        <span>Products</span>
                        <span>Actions</span>
                    </div>

                    @foreach($orders as $order)
                        <div class="table-item">
                            <span>{{ $order->id }}</span>
                            <span>{{ $order->user->full_name }}</span>
                            <span>{{ $order->total }}</span>
                            <span>
                                @switch($order->status)
                                    @case('new')
                                        <a href="{{ route('order.toggle', [$order, 'status' => 'delivered']) }}">Delivered</a>
                                        @break
                                    @case('canceled')
                                        <a href="{{ route('order.toggle', [$order, 'status' => 'delivered']) }}">Delivered</a>
                                        @break
                                    @case('completed')
                                        <a href="{{ route('order.toggle', [$order, 'status' => 'canceled']) }}">Canceled</a>
                                        @break
                                    @case('delivered')
                                        <a href="{{ route('order.toggle', [$order, 'status' => 'completed']) }}">Completed</a>
                                        @break
                                @endswitch
                                <a href="">Remove</a>
                            </span>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
