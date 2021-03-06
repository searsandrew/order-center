<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'title', 'slug', 'body', 'user_id',
    ];

    public function owner()
    {
        return $this->belongsTo('App\User');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function scopeCompleted($query)
    {
        return $query->where('completed', true);
    }

    public function scopeUncompleted($query)
    {
        return $query->where('completed', false);
    }
}
