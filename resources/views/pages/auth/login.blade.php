@extends('layout.layout')

@section('page_title', 'Авторизация')

@section('content')
    <section>
        @include('components.errors')
    </section>
    <form action="{{ route('auth.loginUser') }}" method="post">
        @csrf
        <input type="text" name="login" placeholder="Логин">
        <input type="password" name="password" placeholder="Пароль">

        <button type="submit">Войти</button>
    </form>
@endsection
