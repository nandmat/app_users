@extends('layouts.app')

@section('title', 'USUARIO')

@section('content')

    <h1 class="h1 m-4">Listagem de usuários</h1>

    <div class="col-6 m-4">
        <ul class="list-group">
            <li class="list-group-item">{{ $user->name }}</li>
            <li class="list-group-item">{{ $user->email }}</li>
            <li class="list-group-item">{{ $user->created_at }}/li>
          </ul>
    </div>

    <div class="col-6 m-4">
        <form action="{{ route('users.destroy', ['id' => $user->id]) }}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger">Deletar</button>
        </form>
    </div>
@endsection


