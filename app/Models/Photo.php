<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function album() {
        return $this->belongsTo(Album::class, "album_id");
    }

    public function tags() {
        return $this->belongsToMany(Tag::class,"possede_tag", "photo_id","tag_id");
    }
}
