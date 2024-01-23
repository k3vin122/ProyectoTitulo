<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cinta extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'codigo',
        'almacenamiento',
        'marca',
        'ingreso_cinta_sn_rotulo_id',
    ];

    protected $searchableFields = ['*'];

    public function movimientos()
    {
        return $this->hasMany(Movimiento::class);
    }

    public function ingresoCintaSnRotulo()
    {
        return $this->belongsTo(IngresoCintaSnRotulo::class);
    }
}
