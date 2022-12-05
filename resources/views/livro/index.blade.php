{{-- inherit from view base --}}
@extends('dashboard')

{{-- create a section to specific code --}}
@section('content')
    @if (!is_null($livros))
        <table class="table table-striped" style="padding-top: 10px;">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Qtd. de Páginas</th>
                    <th>Autor</th>
                    <th>Editora</th>
                    <th>Gênero</th>
                    <th colspan="3" class="text-center">Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($livros as $livro)
                    <tr>
                        <td>{{ $livro->titulo }}</td>
                        <td>{{ $livro->paginas }}</td>
                        <td>{{ $livro->autor }}</td>
                        <td>{{ $livro->editora }}</td>
                        <td>{{ $livro->genero->nome }}</td>
                        <td>
                            <a class="nav-link text-primary" href="{{ route('livros.show', $livro->id) }}">Mostrar</a>
                        </td>
                        <td>
                            <a class="nav-link text-success" href="{{ route('livros.edit', $livro->id) }}">Editar</a>
                        </td>
                        <td>
                            <form action="{{ route('livros.destroy', $livro->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="nav-link text-danger" type="submit">
                                    Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h3 class="text-muted">Nenhum livro foi encontrado!</h3>
    @endif
@endsection