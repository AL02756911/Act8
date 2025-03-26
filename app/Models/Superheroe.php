<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Superheroe extends Model
{
    protected $fillable = ['nombre_real', 'alias', 'foto', 'informacion_adicional'];
}
