@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Cadastrar Postagem</div>
    <div class="card-body">
        <form action="/admin/postagem" method="POST">
            @csrf

            <div class="form-group">
                <label for="nome">Nome: </label>
                <input class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" type="text" name="nome" id="nome" value="{{ old('nome') }}">
                @if ($errors->has('nome'))
                <div class="invalid-feedback">{{ $errors->first('nome') }}</div>
                @endif
            </div>

            <div class="form-group">
                <label for="descricao">Descrição: </label>
                <textarea name="descricao" rows="10" class="form-control{{ $errors->has('descricao') ? ' is-invalid' : '' }}" id="descricao">{{ old('descricao') }}</textarea>
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