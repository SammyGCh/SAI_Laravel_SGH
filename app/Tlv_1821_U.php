<?php

namespace SAI;

use Illuminate\Database\Eloquent\Model;

class Tlv_1821_U extends Model
{
    protected   $table='tlv_1821_u';
    protected   $primaryKey='correoInstitucional';

    public $timestamps=false;

    protected   $fillable =[
        'correoInstitucional',
        'nombre',
        'password',
        'telefono',
        'status',
        'idRol',
        'idarea'
    ];

    protected $guarded =[

    ];
}
