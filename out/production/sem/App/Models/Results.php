<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Results extends Model
{
    use HasFactory;
    protected $fillable = ['id_track', 'id_driver'];

    public function track() {
        return $this->belongsToMany(Track::Class);
    }

    public function driver() {
        return $this->belongsToMany(Driver::Class);
    }
}
