@extends('layout.layout')

@section('page_title', $product->name)

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="section__title">{{$product->name}}</h1>
        </div>
    </section>
@endsection
