<?php

namespace App\Http\Controllers;

use App\Estado;
use Illuminate\Http\Request;

class EstadoController extends Controller
{

    public function __construct()
    {
        //Evita que o usuário possa acessar a página através do endereço, sem estar logado
        $this->middleware('auth');
    }

    public function index()
    {
        //exibe em ordem decrescente
        //$estado = Estado::latest()->paginate(5);

        $estado = Estado::paginate(5);
        return view('estado.index', compact('estado'))->with('i', (request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estado = Estado::paginate()->sortBy('estado');
        return view ('estado.create')->with('estado', $estado);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'estado' => 'required',
            'UF' => 'required|min:2|max:2'
        ]);

        $estado = Estado::create($validatedData);

        return redirect()->route('estado.index')->with('success', 'Cadastro incluído com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function show(Estado $estado)
    {
        Estado::findOrFail($estado);
        
        //retorna view passando a(s) variavel(is)
        return view('estado.show', compact('estado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function edit(Estado $estado)
    {
        $d = Estado::findOrFail($estado->id);

        return view('estado.edit', compact('estado'))->with('estado', $estado);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estado $estado)
    {
        $validatedData = $request->validate([
            'estado' => 'required',
            'UF' => 'required|min:2|max:2'
        ]);

        Estado::whereId($estado->id)->update($validatedData);

        return redirect()->route('estado.index')->with('success', 'Cadastro atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estado $estado)
    {
        $d = Estado::findOrFail($estado->id);
        $d->delete();
        
        return redirect()->route('estado.index')->with('success', 'Cadastro deletado com sucesso!');
    }
}
