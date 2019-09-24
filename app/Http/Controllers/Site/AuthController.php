<?php

namespace App\Http\Controllers\Site;

use App\Repositories\User\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class AuthController
 * @package App\Http\Controllers\Site
 */

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
     * View login
     */
    public function getLogin()
    {

    }

    /**
     * Request to login
     */
    public function postLogin()
    {

    }

    /**
     * View register
     */
    public function getRegister ()
    {

    }

    /**
     * Request to register
     */
    public function postRegister ()
    {

    }
}
