<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Employer\EmployerRepository;
use App\Repositories\Job\JobRepository;
use App\Http\Requests\Employer\StoreRequest;
use App\Http\Requests\Employer\UpdateRequest;
use App\Http\Controllers\Controller;

/**
 * Class EmployerController
 * @package App\Http\Controllers\Admin
 */

class EmployerController extends Controller
{
    /**
     * @var ViewPath
     */
    private $view = 'admin.modules.employer.';

    /**
     * @var RouteName
     */
    private $route = 'admin.employer.';

    /**
     * @var Message
     */
    private $message = 'message.employer.';

    /**
     * @var EmployerRepository
     */
    private $employer;

    /**
     * @var JobRepository
     */
    private $job;

    /**
     * EmployerController constructor.
     * @param EmployerRepository $employer
     */
    public function __construct(EmployerRepository $employer,JobRepository $job)
    {
        $this->employer = $employer;
        $this->job      = $job;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['employers'] = $this->employer->getAllNoLimit();
        return view($this->view.'index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->view.'create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $data           = $request->all();
        $data['status'] = ($request->status == "on") ? "on": "off";
        $this->employer->create($data);

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
        $data['employer'] = $this->employer->getById($id);
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
        $data           = $request->except(['_token','_method','btnSave','btnSaveClose']);
        $data['status'] = ($request->status == "on") ? "on": "off";
        $this->employer->update($data,$id);

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
        $totalJob = $this->job->totalItem();
        if ($totalJob >= 0) {
            return redirect()->route($this->route.'index')->with('warning',__($this->message.'delete_fail'));
        }
        
        $this->employer->remove($id);
        return redirect()->route($this->route.'index')->with('success',__($this->message.'delete_success'));
    }

    public function job ($id) 
    {
        $data['employer'] = $this->employer->getJobByEmployer($id);
        return view($this->view.'job',$data);
    }
}
