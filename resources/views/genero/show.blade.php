@extends('dashboard')

@section('content')
    <div class=" row">
        <div class="col">
            <h2>{{ $genero->nome }}</h2>
            <hr>
            <p><strong>Descrição:</strong> {{ $genero->descricao }}</p>
            <p><strong>Categoria:</strong> {{ $genero->categoria }}</p>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="text-center">
            <a class="btn btn-danger" href="{{ route('generos.index') }}">Voltar</a>
        </div>
    </div>
@endsection