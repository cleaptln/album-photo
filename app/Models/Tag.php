<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function photos() {
        return $this->belongsToMany(Photo::class, "possede_tag", "tag_id", "photo_id");
    }
}
