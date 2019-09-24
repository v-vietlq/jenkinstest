<?php

namespace App\Http\Controllers\Member;

use App\Repositories\User\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    /**
     * @var UserRepository
     */
    private $user;

    /**
     * AuthController constructor.
     * @param UserRepository $user
     */
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }


    /**
     * Edit myself
     */
    public function edit ()
    {

    }
}
