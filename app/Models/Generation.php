<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;


class Generation extends Model
{
    use HasFactory;
    

    protected $fillable = ['name', 'description'];

    public function pokemons(): hasMany{
        return $this->hasMany(Pokemon::class);
    }
}
