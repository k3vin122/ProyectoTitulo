<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rotulo extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['codigo', 'estado_rotulo_id'];

    protected $searchableFields = ['*'];

    public function estadoRotulo()
    {
        return $this->belongsTo(EstadoRotulo::class);
    }

    public function ingresoCintaSnRotulos()
    {
        return $this->hasMany(IngresoCintaSnRotulo::class);
    }
}
