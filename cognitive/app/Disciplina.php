<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Disciplina extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    protected $fillable = ['idarea', 'disciplina'];
    protected $dates = ['deleted_at'];


    /**
     * Get the area that owns the disciplina.
     */
    public function Area()
    {
        return $this->belongsTo(Area::class,'idarea','id');
    }

    public function Disciplina()
    {
        return $this->hasMany(Disciplina::class,'iddisciplina','id');
    }

}
