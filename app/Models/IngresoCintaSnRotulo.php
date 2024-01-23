<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IngresoCintaSnRotulo extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'serie',
        'almacenamiento',
        'marca',
        'estado_sn_rotulo_id',
        'rotulo_id',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'ingreso_cinta_sn_rotulos';

    public function cintas()
    {
        return $this->hasMany(Cinta::class);
    }

    public function estadoSnRotulo()
    {
        return $this->belongsTo(EstadoSnRotulo::class);
    }

    public function rotulo()
    {
        return $this->belongsTo(Rotulo::class);
    }
}
