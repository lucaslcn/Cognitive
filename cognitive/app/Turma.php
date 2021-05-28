<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Turma extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    protected $fillable = ['idturma', 'turma', 'idaluno', 'idprofessor'];
    protected $dates = ['deleted_at'];


    /**
     * Get the disciplina that owns the turma.
     */
    public function Disciplina()
    {
        return $this->belongsTo(Disciplina::class,'iddisciplina','id');
    }


    public function Aluno()
    {
        return $this->hasMany(User::class, 'iduser', 'id');
    }

    public function Professor()
    {
        return $this->hasOne(User::class, 'iduser', 'id');
    }
}
