@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-deck">
        @php ($i = 1)
        @foreach($postagens as $post)
        @if ($i++ == 2) 
        </div><br><div class="card-deck">
        @php ($i = 1)
        @endif
        <div class="card" data-postagem="{{ $post->id }}">
            <div class="card-header">{{ $post->nome }}</div>
            <div class="card-body">
                <p class="card-text">{{ Str::words($post->descricao, 50) }}</p>
                <a href="/postagem/{{ $post->id }}" class="btn btn-sm btn-primary float-right">Ler mais</a>
                <p class="card-text"><small class="text-muted">
                    <strong>{{ $post->user->name }}</strong>
                    &minus; {{ $post->created_at->format('d/m/Y H:i') }}
                </small></p>
            </div>
        </div>
        @endforeach
    </div>

    <br>
    {{ $postagens }}
        
</div>
@endsection
