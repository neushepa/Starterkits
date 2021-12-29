<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravelista\Comments\Commentable;

class Post extends Model
{
    use HasFactory, Commentable;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function last_update()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getStatusTextAttribute()
    {
        if ($this->is_publish == 1) {
            return '<span class="badge badge-success">Publish</span>';
        } elseif ($this->is_publish == 2) {
            return '<span class="badge badge-primary">Draft</span>';
        } elseif ($this->is_publish == 3) {
            return '<span class="badge badge-warning">Pending</span>';
        } else {
            return '<span class="badge badge-danger">Rejected</span>';
        }
    }
}
