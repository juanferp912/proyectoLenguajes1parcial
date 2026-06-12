<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prediccion extends Model
{
    use HasFactory;

    protected $table = 'predicciones';

    protected $fillable = [
        'user_id',
        'partido_id',
        'goles_local_prediccion',
        'goles_visitante_prediccion'
    ];
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function partido()
    {
        return $this->belongsTo(Partido::class, 'partido_id');
    }
}