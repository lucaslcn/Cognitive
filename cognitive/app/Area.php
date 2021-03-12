<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
{
    use SoftDeletes;

    protected $fillable = ['area'];
    protected $dates = ['deleted_at'];
    
    /**
     * Get the disciplinas for the area.
     */
    public function Disciplina()
    {
        return $this->hasMany('App\Disciplina', 'idarea', 'id');
    }
}
