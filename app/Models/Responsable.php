<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Responsable extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['rut', 'nombre', 'telefono', 'empresa_id'];

    protected $searchableFields = ['*'];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function movimientos()
    {
        return $this->hasMany(Movimiento::class);
    }
}
