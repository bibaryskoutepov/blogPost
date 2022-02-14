<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;
    protected $fillable = ['title','content'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
//    protected $casts = [
//    'created_at' => 'datetime:Y-m-d H:i:s',
//    'updated_at' => 'datetime:Y-m-d H:i:s',
//    'deleted_at' => 'datetime:Y-m-d H:i:s',
//];

}
