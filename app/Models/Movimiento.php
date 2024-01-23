<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movimiento extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'cinta_id',
        'estado_movimiento_id',
        'responsable_id',
        'user_id',
    ];

    protected $searchableFields = ['*'];

    public function cinta()
    {
        return $this->belongsTo(Cinta::class);
    }

    public function estadoMovimiento()
    {
        return $this->belongsTo(EstadoMovimiento::class);
    }

    public function responsable()
    {
        return $this->belongsTo(Responsable::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
