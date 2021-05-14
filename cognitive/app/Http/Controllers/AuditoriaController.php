<?php

namespace App\Http\Controllers;

use App\Auditoria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuditoriaController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        
        $audits = \OwenIt\Auditing\Models\Audit::with('user')
        ->orderBy('created_at', 'desc')->get();
        return view('audits', ['audits' => $audits]);
        
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        //
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        //
    }
    
    /**
    * Display the specified resource.
    *
    * @param  \App\Auditoria  $auditoria
    * @return \Illuminate\Http\Response
    */
    public function show(Auditoria $auditoria)
    {
        //
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Auditoria  $auditoria
    * @return \Illuminate\Http\Response
    */
    public function edit(Auditoria $auditoria)
    {
        //
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Auditoria  $auditoria
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Auditoria $auditoria)
    {
        //
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Auditoria  $auditoria
    * @return \Illuminate\Http\Response
    */
    public function destroy(Auditoria $auditoria)
    {
        //
    }
}
