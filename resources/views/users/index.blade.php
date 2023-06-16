@extends('layouts.app')

@section('title', 'users do sistema')

@section('content')
    <div class="m-2">
        <h1 class="h1">Listagem de usuários
            <a href="{{ route('users.create') }}"
                class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">
                (+)
            </a>
        </h1>
    </div>


    <form action="{{ route('users.index') }}" class="row row-cols-lg-auto g-3 align-items-center m-2" method="get">
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
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->name }}</th>
                    <td>{{ $user->email }}</td>
                    <td><a href="{{ route('comment.index', ['id' => $user->id]) }}"
                            class="btn btn-secondary">Anotações({{ $user->comments->count() }})</a></td>
                    <td><a href="{{ route('users.show', ['id' => $user->id]) }}" class="btn btn-info">Detalhes</a></td>
                    <td><a href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn btn-warning">Alterar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="container">
        <div class="row">
            {{ $users->appends([
                'search' => request()->get('search', '')
            ])->links() }}
        </div>
    </div>
