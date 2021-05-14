<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Cidade extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    protected $fillable = ['idestado', 'cidade', 'cep'];
    protected $dates = ['deleted_at'];


    /**
     * Get the area that owns the disciplina.
     */
    public function Estado()
    {
        return $this->belongsTo(Estado::class, 'idestado', 'id');
    }

}
