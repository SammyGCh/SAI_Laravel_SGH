<?php

namespace SAI;

use Illuminate\Database\Eloquent\Model;

class Tlv_1821_Ar extends Model
{
    protected   $table='tlv_1821_ar';
    protected   $primaryKey='idarea';

    public $timestamps=false;

    protected   $fillable =[
        'nombre',
        'direccion',
        'oficina'
    ];

    protected $guarded =[

    ];
}
