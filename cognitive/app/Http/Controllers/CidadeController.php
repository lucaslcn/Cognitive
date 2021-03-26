<?php

namespace App\Http\Controllers;

use App\Cidade;
use App\Estado;
use Illuminate\Http\Request;

class CidadeController extends Controller
{

    public function __construct()
    {
        //Evita que o usuário possa acessar a página através do endereço, sem estar logado
        $this->middleware('auth');
    }

    public function index()
    {
        //exibe em ordem decrescente
        //$cidades = Cidade::latest()->paginate(5);

        $cidades = Cidade::paginate(5);
        return view('cidade.index', compact('cidades'))->with('i', (request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados = Estado::paginate()->sortBy('estado');
        return view ('cidade.create')->with('estados', $estados);
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
            'idestado' => 'required|numeric',
            'cidade' => 'required',
            'cep' => 'required'
        ]);

        $cidade = Cidade::create($validatedData);

        return redirect()->route('cidade.index')->with('success', 'Cadastro incluído com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function show(Cidade $cidade)
    {
        Cidade::findOrFail($cidade);

        //procura por estado baseado no idestado (codigo para isto fica na model cidade)
        $estado = Estado::find($cidade->idestado);
        
        //retorna view passando a(s) variavel(is)
        return view('cidade.show', compact('cidade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function edit(Cidade $cidade)
    {
        $d = Cidade::findOrFail($cidade->id);
        $estado = Estado::find($cidade->idestado);

        $estados = Estado::paginate()->sortBy('estado');

        return view('cidade.edit', compact('cidade', 'cep', 'estado'))->with('estados', $estados);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cidade $cidade)
    {
        $validatedData = $request->validate([
            'idestado' => 'required|numeric',
            'cidade' => 'required',
            'cep' => 'required'
        ]);

        Cidade::whereId($cidade->id)->update($validatedData);

        return redirect()->route('cidade.index')->with('success', 'Cadastro atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cidade $cidade)
    {
        $d = Cidade::findOrFail($cidade->id);
        $d->delete();
        
        return redirect()->route('cidade.index')->with('success', 'Cadastro deletado com sucesso!');
    }
}
