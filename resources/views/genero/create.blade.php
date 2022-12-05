@extends('dashboard')

@section('content')
    <h2 class="text-center">Novo Gênero</h2>
    <hr>
    <div class="row">
        <form method="POST" action="{{ route('generos.store') }}">
            {{-- protection against cross-site request forgering --}}
            @csrf
            <div class="mb-2 col-6 mx-auto">
                <label for="nome" class="form-label fw-bold">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" value="{{ old('nome') }}">
                @error('nome')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-2 col-6 mx-auto">
                <label for="descricao" class="form-label fw-bold">Descrição</label>
                <textarea type="text" class="form-control" name="descricao" id="descricao">{{ old('descricao') }}</textarea>
                @error('descricao')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-2 col-6 mx-auto">
                <label for="categoria" class="form-label fw-bold">Categoria</label>
                <input type="input" class="form-control" name="categoria" id="categoria" value="{{ old('categoria') }}">
                @error('categoria')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="text-center my-4 col-6 mx-auto">
                <input type="submit" class="btn btn-success" value="Enviar">
                <input type="reset" class="btn btn-danger" value="Limpar">
            </div>
        </form>
    </div>

@endsection