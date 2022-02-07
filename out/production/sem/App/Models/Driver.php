<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'country', 'id_team'];

    public function team()
    {
        return $this->hasOne('Track', 'id_team');
    }

    public function results()
    {
        return $this->belongsToMany(Results::Class);
    }

}
