@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <h3 class="card-header">{{ $postagem->nome }}</h3>
        <blockquote class="card-body lead text-justify">
            <p class="card-text">{{ $postagem->descricao }}</p>
            <div class="text-right">
                <strong>{{ $postagem->user->name }}</strong>
                <small class="text-muted">&minus; {{ $postagem->created_at->format('d/m/Y H:i') }}</small>
            </div>
        </blockquote>
    </div>
    <br>

    <div class="card">
        <div class="card-header">Comentários</div>
        <div class="card-body">
            @if (count($postagem->comentarios) > 0)
                @php ($i = 1) @endphp
                @foreach($postagem->comentarios as $comentario)
                <div class="cart-text">
                    <div>
                        <strong>{{ $comentario->nome }}</strong>
                        <small class="text-muted"> &minus; {{ $comentario->created_at->format('d/m/Y H:i') }}</small>
                        @auth
                        <form action="/comentario/{{ $comentario->id }}" method="POST" class="float-right">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                        @endauth
                    </div>
                    <div>{{ $comentario->descricao }}</div>
                    @if ($i++ < count($postagem->comentarios))
                    <hr>
                    @endif
                </div>
                @endforeach
            @else
                <div class="cart-text text-center">Nenhum comentário até o momento. Seja o primeiro!</div>
            @endif
        </div>
        <div class="card-footer">
            <form method="POST" action="/comentario">
                @csrf
                <input type="hidden" name="postagem_id" value="{{ $postagem->id }}">
                <div class="form-group">
                    <input class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" type="text" name="nome" id="nome" value="{{ Auth::check() ? Auth::user()->name : old('nome') }}" placeholder="Seu nome">
                    @if ($errors->has('nome'))
                    <div class="invalid-feedback">{{ $errors->first('nome') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <textarea name="descricao" placeholder="Seus comentários" class="form-control{{ $errors->has('descricao') ? ' is-invalid' : '' }}" id="descricao">{{ old('descricao') }}</textarea>
                    @if ($errors->has('descricao'))
                    <div class="invalid-feedback">{{ $errors->first('descricao') }}</div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
                <button type="reset" class="btn btn-light">Cancelar</button>
            </form>
        </div>
    </div>
</div>
@endsection
