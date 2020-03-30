<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Registros extends Model
{
    protected $table = 'registros';
    protected $fillable = ['NOMBRE_REGI','RFC_REGI','CORREO_REGI','DIRECCION_REGI','COMENTARIOS_REGI','LATIDTUD_REGI','LONGITUD_REGI'];
    
}
