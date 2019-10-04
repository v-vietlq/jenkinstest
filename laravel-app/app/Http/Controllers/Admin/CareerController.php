<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Career\CareerRepository;
use App\Http\Requests\Career\StoreRequest;
use App\Http\Requests\Career\UpdateRequest;
use App\Http\Controllers\Controller;

class CareerController extends Controller
{
    /**
     * @var ViewPath
     */
    private $view = 'admin.modules.career.';

    /**
     * @var RouteName
     */
    private $route = 'admin.career.';

    /**
     * @var Message
     */
    private $message = 'message.career.';

    /**
     * @var CareerRepository
     */
    private $career;
    

    /**
     * careerController constructor.
     * @param CareerRepository $career
     */
    public function __construct(CareerRepository $career)
    {
        $this->career = $career;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['careers'] = $this->career->getAllNoLimit();
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
        $this->career->create($data);

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
        $data['career'] = $this->career->getById($id);
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
        $this->career->update($data,$id);

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
        $this->career->remove($id);
        return redirect()->route($this->route.'index')->with('success',__($this->message.'delete_success'));
    }
}
