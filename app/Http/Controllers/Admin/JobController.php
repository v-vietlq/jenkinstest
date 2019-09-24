<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Category_Job\CategoryJobRepository;
use App\Repositories\Career\CareerRepository;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Employer\EmployerRepository;
use App\Repositories\Job\JobRepository;
use App\Http\Requests\Job\StoreRequest;
use App\Http\Requests\Job\UpdateRequest;
use App\Http\Controllers\Controller;

/**
 * Class JobController
 * @package App\Http\Controllers\Admin
 */

class JobController extends Controller
{
    /**
     * @var ViewPath
     */
    private $view = 'admin.modules.job.';

    /**
     * @var RouteName
     */
    private $route = 'admin.job.';

    /**
     * @var Message
     */
    private $message = 'message.job.';

    /**
     * @var JobRepository
     */
    private $job;

    /**
     * @var CategoryRepository
     */
    private $category;

    /**
     * @var EmployerRepository
     */
    private $employer;

    /**
     * @var CategoryJobRepository
     */
    private $categoryJob;

    /**
     * @var CareerRepository
     */
    private $career;

    /**
     * JobController constructor.
     * @param JobRepository $job
     * @param CategoryJobRepository $categoryJob
     */
    public function __construct(JobRepository $job,
                                CategoryRepository $category,
                                EmployerRepository $employer,
                                CategoryJobRepository $categoryJob,
                                CareerRepository $career)
    {
        $this->job         = $job;
        $this->category    = $category;
        $this->employer    = $employer;
        $this->categoryJob = $categoryJob;
        $this->career      = $career;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['jobs'] = $this->job->getAllNoLimit();
        return view($this->view.'index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['category'] = $this->category->getAllByPosition()->toArray();
        $data['careers']  = $this->career->getAllNoLimit('asc');
        $totalEmployer    = $this->employer->totalItem();
        if ($totalEmployer <= 0) {
            return redirect()->route($this->route.'index')->with('warning',__($this->message.'no_employer'));
        }
        return view($this->view.'create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $data                  = $request->all();
        $data['status']        = ($request->status == "on") ? "on": "off";
        $data['contract']      = serialize($request->contract);
        $data['working_hours'] = serialize($request->working_hours);
        $data['gender']        = serialize($request->gender);
        $job                   = $this->job->create($data);

        $totalCategory         = $this->category->totalItem();
        
        if ($totalCategory <= 0) {
            return redirect()->route($this->route.'create')->with('warning',__($this->message.'no_category'));
        } else {
            foreach ($request->category as $category) {
                $employer_job = array(
                    'category_id' => $category,
                    'job_id'      => $job->id
                );
                $this->categoryJob->create($employer_job);
            }
        }
    
        if ($request->btnSave) {
            return redirect()->route($this->route.'create')->with('success',__($this->message.'create_success'));
        } else {
            return redirect()->route($this->route.'index')->with('success',__($this->message.'create_success'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['job']               = $this->job->getById($id);
        $data['category']          = $this->category->getAllNoLimit('asc')->toArray();
        $data['category_selected'] = $this->categoryJob->getCateByJob($id)->toArray();
        $data['employer']          = $this->employer->getById($data['job']->employer_id);
        $data['careers']           = $this->career->getAllNoLimit('asc');
        return view($this->view.'edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
       
        $data                  = $request->except(['_token','_method','btnSave','btnSaveClose','category']);
        $data['status']        = ($request->status == "on") ? "on": "off";
        $data['contract']      = serialize($request->contract);
        $data['working_hours'] = serialize($request->working_hours);
        $data['gender']        = serialize($request->gender);
        $this->job->update($data,$id);

        $this->categoryJob->deleteCateByJob($id);
        foreach ($request->category as $category) {
            $employer_job = array(
                'category_id' => $category,
                'job_id'      => $id
            );
            $this->categoryJob->create($employer_job);
        }

        if ($request->btnSave) {
            return redirect()->route($this->route.'edit',['id' => $id])->with('success',__($this->message.'edit_success'));
        } else {
            return redirect()->route($this->route.'index')->with('success',__($this->message.'edit_success'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->categoryJob->deleteCateByJob($id);
        $this->job->remove($id);
        return redirect()->route($this->route.'index')->with('success',__($this->message.'delete_success'));
    }
}
