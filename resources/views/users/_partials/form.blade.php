@csrf
{{-- <input type="text" name="name" placeholder="Nome:" value="{{ $user->name ?? old('name')}}">
<input type="email" name="email" placeholder="Email:" value="{{ $user->email ?? old('email') }}">
<input type="password" name="password" placeholder="Senha:" value=""> --}}


<div class="row g-3">
    <div class="col-sm-7">
        <input type="text" class="form-control" name="name" placeholder="Nome:"
            value="{{ $user->name ?? old('name') }}" aria-label="Nome:">
    </div>
    <div class="col-sm">
        <input type="email" class="form-control" name="email" placeholder="Email:"
            value="{{ $user->email ?? old('email') }}" aria-label="Email:">
    </div>
    <div class="col-sm">
        <input type="password" id="inputPassword6" class="form-control" aria-labelledby="passwordHelpInline"
            name="password" placeholder="Senha:">
    </div>

    <div class="col-sm">
        @if (isset($user))
            <button type="submit" class="btn btn-success">Atualizar</button>
        @else
            <button type="submit" class="btn btn-success">Cadastrar</button>
        @endif
    </div>
</div>
