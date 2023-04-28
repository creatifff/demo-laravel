@extends('layout.layout')

@section('page_title', 'Update Product' . $product->name)

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="section__title">Update product</h1>

            @include('components.errors')

            <form
                enctype="multipart/form-data"
                action="{{ route('product.update', $product) }}"
                method="post"
            >
                @csrf

                <input type="text" name="name" placeholder="Название продукта" value="{{ $product->name }}">
                <input type="text" name="short_text" placeholder="Краткое описание" value="{{ $product->short_text }}">
                <input type="text" name="price" placeholder="Цена" value="{{ $product->price }}">
                <input min="1" type="number" name="quantity" placeholder="Кол-во товара" value="{{ $product->quantity }}">

                <div class="image">
                    <img src="{{ $product->imageUrl() }}" alt="{{ $product->name }}">
                </div>

                <input type="file" name="image_path">
                <label>
                    <input type="checkbox" @if($product->is_published) checked @endif checked name="is_published">
                    Опубликовать товар?
                </label>

                <textarea name="text" placeholder="Описание продукта">{{ $product->text }}</textarea>

                <select name="collection_id">
                    @foreach($collections as $collection)
                        <option
                            @if($collection->id === $product->collection_id) selected @endif
                            value="{{ $collection->id }}"
                        >
                            {{ $collection->name }} - {{ $collection->products()->count() }} шт.
                        </option>
                    @endforeach
                </select>

                <button type="submit">Update</button>

            </form>
        </div>
    </section>
@endsection
