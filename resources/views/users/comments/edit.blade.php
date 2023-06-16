@extends('layouts.app')

@section('title', 'Editar Comentário')

@section('content')
    <h1>Editar Comentário: {{ $user->name }}
        <a href="{{ route('comment.create', ['id' => $user->id]) }}"
            class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">
            (+)
        </a>
    </h1>

    @include('includes.validations-form')

    <form action="{{ route('comment.update', ['id' => $comment->id]) }}" class="form-control m-6" method="post">
        @method('PUT')
        @include('users.comments._partials.form')
    </form>
@endsection
