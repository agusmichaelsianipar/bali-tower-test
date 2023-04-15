<?php

namespace BTNewsApp\Domain\Logs;

use BTNewsApp\Domain\Users\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Log extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'event', 'user_id', 'url','method','ip_address','user_agent'
    ];

    public static function record($event, $user_id, $url,$method, $ip_address, $user_agent)
    {
        return static::create([
            'event' => $event,
            'user_id' => $user_id,
            'url' => $url,
            'method' => $method,
            'ip_address' => $ip_address,
            'user_agent' => $user_agent,
        ]);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
