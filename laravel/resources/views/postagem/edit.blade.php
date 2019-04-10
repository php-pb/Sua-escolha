@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Editar Postagem</div>
    <div class="card-body">
        <form action="/admin/postagem/{{ $post->id }}" method="POST">
            @csrf
            <input type="hidden" name="_method" value="PUT">

            <div class="form-group">
                <label for="nome">Nome: </label>
                <input class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" type="text" name="nome" id="nome" value="{{ $errors->any() ? old('nome') : $post->nome }}">
                @if ($errors->has('nome'))
                <div class="invalid-feedback">{{ $errors->first('nome') }}</div>
                @endif
            </div>

            <div class="form-group">
                <label for="descricao">Descrição: </label>
                <textarea name="descricao" rows="10" class="form-control{{ $errors->has('descricao') ? ' is-invalid' : '' }}" id="descricao">{{ $errors->any() ? old('descricao') : $post->descricao }}</textarea>
                @if ($errors->has('descricao'))
                <div class="invalid-feedback">{{ $errors->first('descricao') }}</div>
                @endif
            </div>
            
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="/admin/postagem" class="btn btn-light">Cancelar</button>
        </form>
    </div>
</div>

@endsection