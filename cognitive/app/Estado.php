<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
class Estado extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    protected $table = "estado";
    protected $fillable = ['estado', 'UF'];
    protected $dates = ['deleted_at'];

    public function Cidade()
    {
        return $this->hasMany(Cidade::class, 'idestado', 'id');
    }

}
