<?php

namespace BTNewsApp\Domain\Comments;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'news_id',
        'title',
        'content'
    ];
}
