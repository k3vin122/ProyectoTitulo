<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EstadoMovimiento extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['desc'];

    protected $searchableFields = ['*'];

    protected $table = 'estado_movimientos';

    public function movimientos()
    {
        return $this->hasMany(Movimiento::class);
    }
}
