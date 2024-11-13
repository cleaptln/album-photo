<?php
// app/models/ Photo - Album - Tag
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function photos() {
        return $this->hasMany(Photo::class, "album_id");
    }

    public function user() {
        return $this->belongsTo(User::class,"user_id");
    }
}
