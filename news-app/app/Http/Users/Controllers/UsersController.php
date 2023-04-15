<?php

namespace BTNewsApp\Http\Users\Controllers;

use BTNewsApp\Domain\Users\User;
use BTNewsApp\App\Controllers\Controller;

class UsersController extends Controller
{
    public function __construct(){
        // 
    }
    public function user($id)
    {
        return User::find($id);
    }

}
