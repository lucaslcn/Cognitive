<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function index()
    {
        //Role::create(['name'=>'admin']);
        //Role::create(['name'=>'professor']);
        //Role::create(['name'=>'aluno']);

        //$permission = Permission::create(['name'=>'write estado']);
        //$role = Role::findById(1);
        //$role->givePermissionTo(1);
        //auth()->user()->assignRole('admin');


        return view('home');
    }
}
