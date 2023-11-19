<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ability extends Model
{
    use HasFactory;
    

    protected $fillable = ['name','desciption', 'type_id'];

    public function type(): belongsTo{
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function pokemons(): hasMany{
        return $this->hasMany(Pokemon::class, 'pokemon_id');
    }
}
