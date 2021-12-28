<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $append = ['status_text'];

    public function member()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function getStatusTextAttribute()
    {
        if ($this->status == 1) {
            return '<span class="badge badge-primary">Todo</span>';
        } elseif ($this->status == 2) {
            return '<span class="badge badge-warning">In Progress</span>';
        } else {
            return '<span class="badge badge-success">Completed</span>';
        }
    }
}
