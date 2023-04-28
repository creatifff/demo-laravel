@extends('layout.layout')

@section('page_title', 'Регистрация')

@section('content')
    <div class="container">
    <section>
        @include('components.errors')
    </section>
    <form action="{{ route('auth.createUser') }}" method="post">
        @csrf
        <input type="text" name="name" placeholder="Имя">
        <input type="text" name="surname" placeholder="Фамилия">
        <input type="text" name="midname" placeholder="Отчество">
        <input type="text" name="login" placeholder="Логин">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Пароль">
        <input type="password" name="re_password" placeholder="Повторите пароль">

        <label>
            <input type="checkbox" name="rules">
            Согласие с правилами регистрации
        </label>

       <button type="submit">Регистрация</button>
    </form>
    </div>
@endsection
