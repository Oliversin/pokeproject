<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pokemon extends Model
{
    use HasFactory;
    protected $table = 'pokemons';

    protected $fillable = ['name','sprite','generation_id'];

    public function types(): BelongsToMany{
        return $this->BelongsToMany(Type::class, 'pokemons_types','pokemon_id','type_id');
    }

    public function abilities(): BelongsToMany{
        return $this->BelongsToMany(Abilities::class, 'abilities_pokemons','ability_id','pokemon_id');
    }

    public function generation(): belongsTo{
        return $this->belongsTo(Generation::class, 'generation_id');
    }
}
