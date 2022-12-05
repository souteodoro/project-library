@extends('dashboard')

@section('content')
    <h2 class="text-center">Novo Livro</h2>
    <hr>
    <div class="row">
        <form method="POST" action="{{ route('livros.store') }}" enctype="multipart/form-data">
            {{-- protection against cross-site request forgering --}}
            @csrf
            <div class="mb-2 col-6 mx-auto">
                <label for="titulo" class="form-label fw-bold">Título</label>
                <input type="text" class="form-control" name="titulo" id="titulo" value="{{ old('titulo') }}">
                @error('titulo')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-2 col-6 mx-auto">
                <label for="paginas" class="form-label fw-bold">Qtd. de Páginas</label>
                <input type="number" class="form-control" name="paginas" id="paginas" value="{{ old('paginas') }}">
                @error('paginas')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-2 col-6 mx-auto">
                <label for="autor" class="form-label fw-bold">Autor:</label>
                <input type="text" class="form-control" name="autor" id="autor" value="{{ old('autor') }}">
                @error('autor')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-2 col-6 mx-auto">
                <label for="editora" class="form-label fw-bold">Editora:</label>
                <input type="text" class="form-control" name="editora" id="editora" value="{{ old('editora') }}">
                @error('editora')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-2 col-6 mx-auto">
                <label for="genero" class="form-label fw-bold">Gênero</label>
                <select class="form-select" name="genero" id="genero">
                    @if($generos)
                        @foreach ($generos as $genero)
                            <option value="{{$genero->id}}">{{ $genero->nome }}</option>
                        @endforeach
                    @endif
                </select>
                @error('genero')
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