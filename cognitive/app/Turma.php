<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Turma extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    protected $fillable = ['id', 'iddisciplina', 'idprofessor', 'idaluno', 'turma'];
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
        return $this->belongsToMany(User::class, 'idaluno', 'id');
    }

    public function Professor()
    {
        return $this->belongsTo(User::class, 'idprofessor', 'id');
    }
}
