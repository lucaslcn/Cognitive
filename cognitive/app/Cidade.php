<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cidade extends Model
{
    use SoftDeletes;

    protected $fillable = ['idcidade', 'cidade'];
    protected $dates = ['deleted_at'];


    /**
     * Get the area that owns the disciplina.
     */
    public function Cidade()
    {
        return $this->belongsTo('App\Cidade','idcidade','id');
    }

}
