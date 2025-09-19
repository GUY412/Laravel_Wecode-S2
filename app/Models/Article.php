<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public function autor(){
        return $this->belongsTo(User::class);
    }

      public function category(){
        return $this->belongsTo(Category::class);
    }

      public function comments(){
        return $this->hasMany(Comment::class);
    }

    protected $fillable = ['title', 'description', 'category_id', 'image', 'autor_id'];
    protected $guarded = ['id'];
}
