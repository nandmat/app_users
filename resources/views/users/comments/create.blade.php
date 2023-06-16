@extends('layouts.app')

@section('title', 'Novo Comentário para o Usuário {{ $user->name }}')

@section('content')
    <h1>Novo Comentário para o Usuário {{ $user->name }}</h1>

    @include('includes.validations-form')

    <form action="{{ route('comment.store', ['id' => $user->id]) }}" class="form-control m-6" method="post">
        @include('users.comments._partials.form')
    </form>
@endsection
