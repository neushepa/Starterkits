<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $fillable = ['album_id', 'title', 'description', 'picture'];
    protected $guarded = ['id'];

    public function album()
    {
        return $this->belongsTo(album::class);
    }
}
