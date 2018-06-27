<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['isbn', 'title', 'url', 'image_url'];

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('type')->withTimestamps();
        
    }
    
    public function microposts()
    {
        return $this->hasMany(Micropost::class)->paginate(8);
    }

    public function want_users()
    {
        return $this->users()->where('type', 'want');
    }
     public function have_users()
    {
        return $this->users()->where('type', 'have');
    }
}