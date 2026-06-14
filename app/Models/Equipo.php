<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Equipo extends Model
{
    use HasFactory;
    protected $table = 'equipos';
    protected $fillable = ['nombre', 'bandera_url', 'grupo'];

    /**
     * Accessor para normalizar la URL de la bandera.
     * Si es una URL absoluta (HTTP/HTTPS), la devuelve limpia y directa.
     * Si no, la resuelve localmente con asset().
     */
    protected function banderaUrl(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                if (empty($value)) {
                    return '';
                }
                // Si la URL contiene un enlace de internet, extraemos y devolvemos desde el protocolo
                if (str_contains($value, 'https://')) {
                    return substr($value, strpos($value, 'https://'));
                }
                if (str_contains($value, 'http://')) {
                    return substr($value, strpos($value, 'http://'));
                }
                // Si no, asumimos ruta local y la resolvemos con asset()
                return asset($value);
            }
        );
    }

    public function partidosLocal()
    {
        return $this->hasMany(Partido::class, 'equipo_local_id');
    }

    public function partidosVisitante()
    {
        return $this->hasMany(Partido::class, 'equipo_visitante_id');
    }
}