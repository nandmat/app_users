@extends('layouts.app')

@section('title', 'Comentários do Usuário {{ $user->name }}')

@section('content')
    <div class="m-2">
        <h1 class="h1">Listagem de comentários <b>{{ $user->name }}</b>
            <a href="{{ route('comment.create' ,['id' => $user->id]) }}"
                class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">
                (+)
            </a>
        </h1>
    </div>

    <form action="{{ route('comment.index', ['id' => $user->id]) }}" class="row row-cols-lg-auto g-3 align-items-center m-2" method="get">
        @csrf
        <div class="col-12">
            <label class="visually-hidden" for="inlineFormInputGroupUsername">Search</label>
            <div class="input-group">
                <input type="text" class="form-control" id="inlineFormInputGroupUsername" name="search"
                    placeholder="Pesquisar">
            </div>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Pesquisar</button>
        </div>
    </form>

    <table class="table m-2">
        <thead>
            <tr>
                <th scope="col">Conteúdo</th>
                <th scope="col">Visível</th>
                <th scope="col">Editar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comments as $comment)
                <tr>
                    <th>{{ $comment->body }}</th>
                    <td>{{ $comment->visible ? 'SIM' : 'NÃO' }}</td>
                    <td><a href="{{ route('comment.edit', ['id' => $comment->id, 'user' => $user->id]) }}" class="btn btn-warning">Alterar</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
