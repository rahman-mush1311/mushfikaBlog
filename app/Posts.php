<?php

namespace App;
use App\User;
use App\Tag;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $fillable = [
      					   'title',
                           'short',
                           'des'
                          ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function tag(){
        return $this->belongsToMany(Tag::class);
    }
}
