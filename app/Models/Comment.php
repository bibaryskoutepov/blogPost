<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

//  blog_post_id как мы настроили на блогпост форейн кей
    public function blogPost()
    {
//        второй -> название форин кея если название функции не подходит(тут подходит)
//        третий -> название старого столбца айди(блог пост айди это пример а там написано айди)
//        return $this->belongsTo(BlogPost::class,'post_id','blog_post_id');
        return $this->belongsTo(BlogPost::class);
    }
}
