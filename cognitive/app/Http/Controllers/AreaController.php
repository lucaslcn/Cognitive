<?php

namespace App\Http\Controllers;

use App\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{

    public function __construct()
    {
        //Evita que o usuário possa acessar a página através do endereço, sem estar logado
        $this->middleware('auth');
    }

    public function index()
    {
        //exibe em ordem decrescente
        //$areas = Area::latest()->paginate(5);

        $areas = Area::paginate(5);
        return view('area.index', compact('areas'))->with('i', (request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('area.create');
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
            'area' => 'required',
        ]);

        $area = Area::create($validatedData);

        return redirect()->route('area.index')->with('success', 'Cadastro incluído com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show(Area $area)
    {
        $p = Area::findOrFail($area);

        return view('area.show', compact('area'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit(Area $area)
    {
        $p = Area::findOrFail($area->id);

        return view('area.edit', compact('area'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Area $area)
    {
        $validatedData = $request->validate([
            'area' => 'required',
        ]);

        //Area::whereId($area->id)->update($validatedData);
        
        $dados = Area::findOrFail($area->id);
        $dados->update($validatedData);

        return redirect()->route('area.index')->with('success', 'Cadastro atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $area)
    {
        $p = Area::findOrFail($area->id);
        $p->delete();
        
        return redirect()->route('area.index')->with('success', 'Cadastro deletado com sucesso!');
    }
}
