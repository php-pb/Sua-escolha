@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        Postagens
        <a href="/admin/postagem/create" class="btn btn-sm btn-primary float-right">Cadastrar</a>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Usuário</th>
                    <th>Comentários</th>
                    <th>Criação</th>
                    <th>Atualização</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($postagens as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->nome }}</td>
                    <td>{{ $post->user->name }}</td>
                    <td>{{ $post->comentarios_count }}</td>
                    <td>{{ $post->created_at->format('d/m/Y H:i') }}</td>
                    <td>{{ $post->updated_at->format('d/m/Y H:i') }}</td>
                    <td align="right" class="text-nowrap">
                        <a href="/postagem/{{ $post->id }}" class="btn btn-sm btn-success">Ver</a>
                        <a href="/admin/postagem/{{ $post->id }}/edit" class="btn btn-sm btn-primary">Editar</a>
                        <form action="/admin/postagem/{{ $post->id }}" method="POST" class="d-inline" onSubmit="return confirm('Deseja excluir esta postagem?')">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">{{ $postagens }}</div>
</div>

@endsection