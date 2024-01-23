<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EstadoRotulo extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['desc'];

    protected $searchableFields = ['*'];

    protected $table = 'estado_rotulos';

    public function rotulos()
    {
        return $this->hasMany(Rotulo::class);
    }
}
