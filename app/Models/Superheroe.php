<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Superheroe extends Model
{
    use SoftDeletes;

    protected $fillable = ['nombre_real', 'alias', 'foto', 'informacion_adicional'];
}
