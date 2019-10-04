<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Job\JobRepository;

/**
 * Class JobController
 * @package App\Http\Controllers\Member
 */

class JobController extends Controller
{
    /**
     * @var JobController
     */
    private $job;

    /**
     * JobController constructor.
     * @param JobController $job
     */
    public function __construct(JobRepository $job)
    {
        $this->job = $job;
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
}
