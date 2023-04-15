<?php

namespace BTNewsApp\Http\Users\Controllers;

use BTNewsApp\Domain\Users\User;
use BTNewsApp\Infrastructure\Users\Queries\FindUserByIdContract;
use Illuminate\Support\Facades\Auth;
use BTNewsApp\App\Controllers\Controller;

class UsersController extends Controller
{
    private $findUserById;
    public function __construct(FindUserByIdContract $findUserById){

        $this->findUserById = $findUserById;
        
    }
    public function user()
    {
        $id = Auth::user()->id;

        return $this->findUserById->handle($id);
        
    }

}
