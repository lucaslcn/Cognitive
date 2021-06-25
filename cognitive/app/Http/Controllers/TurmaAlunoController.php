<?php

namespace App\Http\Controllers;

use App\TurmaAluno;
use App\Turma;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TurmaAlunoController extends Controller
{
    
    public function __construct()
    {
        //Evita que o usuário possa acessar a página através do endereço, sem estar logado
        //$this->middleware('auth');
        $this->middleware(['auth', 'role:admin|professor']);
    }
    
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $turmas = Turma::paginate()->sortBy('turma');
        $alunos = User::paginate()->sortBy('name');
        return view ('turmaaluno.create')->with('disciplinas', $turmas)->with('users', $alunos);
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
            'idturma' => 'required|numeric',
            'idaluno' => 'required|numeric',
        ]);
        
        $turmaaluno = TurmaAluno::create($validatedData);
    
    
        return redirect()->route('turma.index')->with('success', 'Cadastro incluído com sucesso!');
    }
    
    /**
    * Display the specified resource.
    *
    * @param  \App\TurmaAluno  $turmaAluno
    * @return \Illuminate\Http\Response
    */
    public function show(TurmaAluno $turmaAluno)
    {
        //
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\TurmaAluno  $turmaAluno
    * @return \Illuminate\Http\Response
    */
    public function edit(TurmaAluno $turmaAluno)
    {
        //
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\TurmaAluno  $turmaAluno
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, TurmaAluno $turmaAluno)
    {
        //
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\TurmaAluno  $turmaAluno
    * @return \Illuminate\Http\Response
    */
    public function destroy(TurmaAluno $turmaAluno)
    {
        $d = TurmaAluno::findOrFail($turmaAluno->id);
        $d->delete();
        return redirect()->route('turma.index')->with('success', 'Cadastro deletado com sucesso!');
    }
}
