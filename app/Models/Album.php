<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    public function gallery()
    {
        return $this->hasMany(gallery::class);
    }

    public function album()
    {
        return $this->belongsTo(gallery::class, 'album_id');
    }
}
