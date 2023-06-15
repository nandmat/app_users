@extends('layouts.app')

@section('title', 'Criar User')

@section('content')
    <h1>Novo User</h1>

    @include('includes.validations-form')

    <form action="{{ route('users.store') }}" class="form-control m-6" method="post">
        @include('users._partials.form')
    </form>
@endsection
