<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use Exception;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $generos = Genero::all();

        return view('genero.index')->with('generos', $generos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('genero.create');
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
        
        $genero = new Genero();
        $genero->nome = $request->input('nome');
        $genero->categoria = $request->input('categoria');
        $genero->descricao = $request->input('descricao');

        $genero->save();

        return redirect(route('generos.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $genero = Genero::find($id);
        
        if($genero){
            return view('genero.show')->with('genero', $genero);
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
        $genero = Genero::find($id);

        return view('genero.edit')->with('genero', $genero);
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
        
        $genero = Genero::find($id);
        
        $genero->nome = $request->input('nome');
        $genero->descricao = $request->input('descricao');
        $genero->categoria = $request->input('categoria');
        
        $genero->save();
        
        return redirect()->route('generos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $genero = Genero::find($id);

        try{
            $genero->delete();
            return redirect(route('generos.index'));
        } catch(Exception $e){
            return abort(404);
        }
            
        
    }

    public static function getGeneros(){
        $generos = Genero::all();
        return $generos;
    }

    public function getRules(){
        $rules = [
            'nome' => 'required|max:200',
            'descricao' => 'required|max:100',
            'categoria' => 'required|max:100',
        ];
        return $rules;
    }

    public function getRulesMessages(){
        $msg = [
            'nome.*' => 'Digite o nome do gênero! Permitido até 200 caracteres',
            'descricao.*' => 'Digite a descrição do gênero! Permitido até 100 caracteres',
            'categoria.*' => 'Digite a categoria do gênero! Perimitido até 100 caracteres'
        ];
        return $msg;
    }
}
