<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    use HasFactory;
    protected $fillable = ['trackname', 'country', 'date', 'time'];

    public function results() {
        return $this->belongsToMany(Results::Class);
    }
}
