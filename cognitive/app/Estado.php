<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estado extends Model
{
    use SoftDeletes;

    protected $table = "estado";
    protected $fillable = ['estado', 'UF'];
    protected $dates = ['deleted_at'];

    public function Disciplina()
    {
        return $this->hasMany('App\Cidades', 'idcidade', 'id');
    }

}
