<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Area extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
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
