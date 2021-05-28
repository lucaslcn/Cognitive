<?php

namespace App\Http\Controllers;

use App\Turma;
use App\Disciplina;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    
    public function __construct()
    {
        //Evita que o usuário possa acessar a página através do endereço, sem estar logado
        $this->middleware('auth');
    }
    
    public function index()
    {
        //exibe em ordem decrescente
        //$turmas = Turma::latest()->paginate(5);
        
        $turmas = Turma::paginate(5);
        return view('turma.index', compact('turmas'))->with('i', (request()->input('page',1)-1)*5);
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $disciplinas = Disciplina::paginate()->sortBy('disciplina');
        return view ('turma.create')->with('disciplinas', $disciplinas);
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
            'iddisciplina' => 'required|numeric',
            'turma' => 'required',
            ]);
            
            $turma = Turma::create($validatedData);
            
            return redirect()->route('turma.index')->with('success', 'Cadastro incluído com sucesso!');
        }
        
        /**
        * Display the specified resource.
        *
        * @param  \App\Turma  $turma
        * @return \Illuminate\Http\Response
        */
        public function show(Turma $turma)
        {
            Turma::findOrFail($turma);
            
            //procura por disciplina baseado no iddisciplina (codigo para isto fica na model turma)
            $disciplina = Disciplina::find($turma->iddisciplina);
            
            //Busca todas auditorias associadas
            $audits = $turma->audits;

            //retorna view passando a(s) variavel(is)
            return view('turma.show', compact('turma', 'disciplina', 'audits')); //->withPost($turma)->withDiff($audits);
            
            
        }
        
        /**
        * Show the form for editing the specified resource.
        *
        * @param  \App\Turma  $turma
        * @return \Illuminate\Http\Response
        */
        public function edit(Turma $turma)
        {
            $d = Turma::findOrFail($turma->id);
            $disciplina = Disciplina::find($turma->iddisciplina);
            
            $disciplinas = Disciplina::paginate()->sortBy('disciplina');
            
            return view('turma.edit', compact('turma', 'disciplina'))->with('disciplinas', $disciplinas);
        }
        
        /**
        * Update the specified resource in storage.
        *
        * @param  \Illuminate\Http\Request  $request
        * @param  \App\Turma  $turma
        * @return \Illuminate\Http\Response
        */
        public function update(Request $request, Turma $turma)
        {
            $validatedData = $request->validate([
                'iddisciplina' => 'required|numeric',
                'idprofessor' => 'required|numeric',
                'turma' => 'required',
                ]);
                
                $dados = Turma::findOrFail($turma->id);
                $dados->update($validatedData);
                
                return redirect()->route('turma.index')->with('success', 'Cadastro atualizado com sucesso!');
            }
            
            /**
            * Remove the specified resource from storage.
            *
            * @param  \App\Turma  $turma
            * @return \Illuminate\Http\Response
            */
            public function destroy(Turma $turma)
            {
                $d = Turma::findOrFail($turma->id);
                $d->delete();
                
                return redirect()->route('turma.index')->with('success', 'Cadastro deletado com sucesso!');
            }
        }
        