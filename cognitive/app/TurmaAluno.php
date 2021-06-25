<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
//use OwenIt\Auditing\Contracts\Auditable;

class TurmaAluno extends Model
{
  //  use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    protected $fillable = ['id', 'idturma', 'idaluno'];
    protected $dates = ['deleted_at'];


    /**
     * Get the disciplina that owns the turma.
     */
    public function Turma()
    {
        return $this->belongsTo(Turma::class,'idturma','id');
    }

    public function Aluno()
    {
        return $this->belongsTo(User::class, 'idaluno', 'id');
    }
}
