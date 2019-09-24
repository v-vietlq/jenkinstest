<?php

namespace App\Http\Controllers\Member;

use App\Repositories\Employer\EmployerRepository;
use App\Repositories\Job\JobRepository;
use App\Repositories\User\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class PersonalController
 * @package App\Http\Controllers\Member
 */
class PersonalController extends Controller
{
    /**
     * @var UserRepository
     */
    private $user;
    /**
     * @var EmployerRepository
     */
    private $employer;
    /**
     * @var JobRepository
     */
    private $job;

    /**
     * PersonalController constructor.
     * @param UserRepository $user
     * @param EmployerRepository $employer
     * @param JobRepository $job
     */
    public function __construct(UserRepository $user, EmployerRepository $employer, JobRepository $job)
    {
        $this->user = $user;
        $this->employer = $employer;
        $this->job = $job;
    }


    /**
     * Profile personal
     */
    public function profile ()
    {
        return view('member.pages.profile');
    }

    /**
     * Applied job
     */
    public function applied ()
    {
        return view('member.pages.applied');
    }

    /**
     * Following job
     */
    public function following ()
    {
        return view('member.pages.following');
    } 
    
    /**
     * Following job
     */
    public function hoso ()
    {
        return view('member.pages.hoso');
    }  

    /**
     * Change password
     */
    public function changepass ()
    {
        return view('member.pages.change_password');
    }  


    /**
     * File personal
     */
    public function file ()
    {

    }
}
