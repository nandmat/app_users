@extends('layouts.app')

@section('title', 'Editar user')

@section('content')
    <h1>Editar user: {{ $user->name }}</h1>

    @if ($errors->any())
        <ul class="errors">
            @foreach ($errors->all() as $error )
                <li class="error">{{ $error }}</li>
            @endforeach
        </ul>
    @else

    @endif

    <form action="{{ route('users.update', ['id' => $user->id]) }}" class="form-control m-6" method="post">
        @method('PUT')
        @include('users._partials.form')
    </form>
@endsection
