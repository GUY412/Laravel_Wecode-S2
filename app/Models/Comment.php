<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\returnSelf;

class Comment extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function article(){
        return $this->belongsTo(Article::class);
    }

    protected $fillable = ['user_id', 'article_id', 'body'];

}
