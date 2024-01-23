<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EstadoSnRotulo extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['desc'];

    protected $searchableFields = ['*'];

    protected $table = 'estado_sn_rotulos';

    public function ingresoCintaSnRotulos()
    {
        return $this->hasMany(IngresoCintaSnRotulo::class);
    }
}
