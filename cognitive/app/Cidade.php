<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cidade extends Model
{
    use SoftDeletes;

    protected $fillable = ['idestado', 'cidade', 'cep'];
    protected $dates = ['deleted_at'];


    /**
     * Get the area that owns the disciplina.
     */
    public function Estado()
    {
        return $this->belongsTo('App\Estado','idestado','id');
    }

}
