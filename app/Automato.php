<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Automato extends Model
{
    protected $table = 'automatos';

    protected $fillable = [
        'nome', 'estados', 'eventos', 'relacao_estados_eventos', 'estado_inicial', 'estados_marcados', 'created_at', 'updated_at'
    ];
}
