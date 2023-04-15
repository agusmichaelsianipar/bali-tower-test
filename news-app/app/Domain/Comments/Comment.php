<?php

namespace BTNewsApp\Domain\Comments;

use BTNewsApp\Domain\News\News;
use BTNewsApp\Domain\Users\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'news_id',
        'title',
        'content'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function news()
    {
      return $this->belongsTo(News::class);
    }
}
