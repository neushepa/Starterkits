<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function title_post()
    {
        return $this->belongsTo(Post::class, 'commentable_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'commenter_id');
    }

    public function getStatusTextAttribute()
    {
        if ($this->approved == 1) {
            return '<span class="badge badge-success">Publish</span>';
        } else {
            return '<span class="badge badge-warning">Pending</span>';
        }
    }
}
