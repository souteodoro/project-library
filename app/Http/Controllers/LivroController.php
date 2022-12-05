<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $livros = Livro::with('genero')->paginate(10);

        return view('livro.index')->with('livros', $livros);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $generos = GeneroController::getGeneros();

        return view('livro.create')->with('generos', $generos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->getRules(), 
             $this->getRulesMessages()
        );
        
        $livro = new Livro();
        $livro->titulo = $request->input('titulo');
        $livro->paginas = $request->input('paginas');
        $livro->autor = $request->input('autor');
        $livro->editora = $request->input('editora');
        $livro->genero_id = $request->input('genero');

        $livro->save();

        return redirect(route('livros.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $livro = Livro::find($id);
        
        if($livro){
            return view('livro.show')->with('livro', $livro);
        } else {
            return abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $livro = Livro::find($id);

        $generos = GeneroController::getGeneros();

        return view('livro.edit')->with('livro', $livro)->with('generos', $generos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate($this->getRules(), 
             $this->getRulesMessages()
        );
        
        $livro = Livro::find($id);
    
        $livro->titulo = $request->input('titulo');
        $livro->paginas = $request->input('paginas');
        $livro->autor = $request->input('autor');
        $livro->editora = $request->input('editora');
        $livro->genero_id = $request->input('genero');
        
        $livro->save();
        
        return redirect(route('livros.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $livro = Livro::find($id);
        
        $livro->delete();
        
        return redirect(route('livros.index'));
    }

    public function getRules(){
        $rules = [
            'titulo' => 'required|max:200',
            'paginas' => 'required|max:400',
            'autor' => 'required|max:100',
            'editora' => 'required|max:100',
            'genero' => 'required'
        ];
        return $rules;
    }

    public function getRulesMessages(){
        $msg = [
            'titulo.*' => 'Digite o título do livro! Permitido até 200 caracteres',
            'paginas.*' => 'Digite a quantidade de páginas! Permitido até 4 digitos',
            'autor.*' => 'Digite o nome do autor do livro! Perimitido até 100 caracteres',
            'editora.*' => 'Digite o nome da editora do livro! Permitido até 100 caracteres',
            'genero.*' => 'Escolha um gênero!'
        ];
        return $msg;
    }

}
