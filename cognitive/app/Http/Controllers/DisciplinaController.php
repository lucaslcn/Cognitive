<?php

namespace App\Http\Controllers;

use App\Disciplina;
use App\Area;
use Illuminate\Http\Request;

class DisciplinaController extends Controller
{

    public function __construct()
    {
        //Evita que o usuário possa acessar a página através do endereço, sem estar logado
        $this->middleware('auth');
    }

    public function index()
    {
        //exibe em ordem decrescente
        //$disciplinas = Disciplina::latest()->paginate(5);

        $disciplinas = Disciplina::paginate(5);
        return view('disciplina.index', compact('disciplinas'))->with('i', (request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::paginate()->sortBy('area');
        return view ('disciplina.create')->with('areas', $areas);
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
            'idarea' => 'required|numeric',
            'disciplina' => 'required',
        ]);

        $disciplina = Disciplina::create($validatedData);

        return redirect()->route('disciplina.index')->with('success', 'Cadastro incluído com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Disciplina  $disciplina
     * @return \Illuminate\Http\Response
     */
    public function show(Disciplina $disciplina)
    {
        Disciplina::findOrFail($disciplina);

        //procura por area baseado no idarea (codigo para isto fica na model disciplina)
        $area = Area::find($disciplina->idarea);
        
        //retorna view passando a(s) variavel(is)
        return view('disciplina.show', compact('disciplina', 'area'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Disciplina  $disciplina
     * @return \Illuminate\Http\Response
     */
    public function edit(Disciplina $disciplina)
    {
        $d = Disciplina::findOrFail($disciplina->id);
        $area = Area::find($disciplina->idarea);

        $areas = Area::paginate()->sortBy('area');

        return view('disciplina.edit', compact('disciplina', 'area'))->with('areas', $areas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Disciplina  $disciplina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Disciplina $disciplina)
    {
        $validatedData = $request->validate([
            'idarea' => 'required|numeric',
            'disciplina' => 'required',
        ]);

        Disciplina::whereId($disciplina->id)->update($validatedData);

        return redirect()->route('disciplina.index')->with('success', 'Cadastro atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Disciplina  $disciplina
     * @return \Illuminate\Http\Response
     */
    public function destroy(Disciplina $disciplina)
    {
        $d = Disciplina::findOrFail($disciplina->id);
        $d->delete();
        
        return redirect()->route('disciplina.index')->with('success', 'Cadastro deletado com sucesso!');
    }
}
