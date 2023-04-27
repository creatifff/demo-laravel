@extends('layout.layout')

@section('page_title', 'Create Product')

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="section__title">Create new product</h1>

            @include('components.errors')

            <form
                enctype="multipart/form-data"
                action="{{ route('product.store') }}"
                method="post"
            >
                @csrf

                <input type="text" name="name" placeholder="Название продукта">
                <input type="text" name="short_text" placeholder="Краткое описание">
                <input type="text" name="price" placeholder="Цена">
                <input min="1" type="number" name="quantity" placeholder="Кол-во товара">
                <input type="file" name="image_path">
                <label>
                    <input type="checkbox" checked name="is_published">
                    Опубликовать товар?
                </label>

                <textarea name="text" placeholder="Описание продукта"></textarea>

                <select name="collection_id">
                    @foreach($collections as $collection)
                        <option value="{{ $collection->id }}">{{ $collection->name }} - {{ $collection->products()->count() }} шт.</option>
                    @endforeach
                </select>

                <button type="submit">Create</button>

            </form>
        </div>
    </section>
@endsection
