@csrf
{{-- <input type="text" name="name" placeholder="Nome:" value="{{ $user->name ?? old('name')}}">
<input type="email" name="email" placeholder="Email:" value="{{ $user->email ?? old('email') }}">
<input type="password" name="password" placeholder="Senha:" value=""> --}}


<div class="row g-3">
    <div class="col-sm-7 align-items-center" >
        <span class="input-group-text">Comentário</span>
        <textarea name="body" cols="10" rows=" 3" class="form-control" aria-label="With textarea">{{ $comment->body ?? old('body')}}</textarea>
        <label class="form-label" for="visible">
            <input class="form-check-input" type="checkbox" name="visible" id=""
                @if (isset($comment) && $comment->visible)
                    checked="checked"
                @endif
            >
            Visível?
        </label>
        <div class="col-sm">
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>
    </div>


</div>
