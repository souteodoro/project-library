@extends('dashboard')

@section('content')
    <div class=" row">
        <div class="col">
            <h2>{{ $livro->titulo }}</h2>
            <hr>
            <p><strong>Qtd. de Páginas:</strong> {{ $livro->paginas }}</p>
            <p><strong>Autor:</strong> {{ $livro->autor }}</p>
            <p><strong>Editora:</strong> {{ $livro->editora }}</p>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="text-center">
            <a class="btn btn-danger" href="{{ route('generos.index') }}">Voltar</a>
        </div>
    </div>
@endsection