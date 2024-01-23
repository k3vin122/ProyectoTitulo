<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Empresa extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['rol', 'nombre', 'direccion', 'telefono', 'correo'];

    protected $searchableFields = ['*'];

    public function responsables()
    {
        return $this->hasMany(Responsable::class);
    }
}
