<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Type extends Model
{
    use HasFactory;

    public $fillable = ['name', 'description',];


    public function pokemons(){
        return $this->belongsToMany(Pokemon::class,'pokemons_types','type_id','pokemon_id');
    }

    public function abilities(): hasMany{
        return $this->hasMany(Ability::class);
    }
}
