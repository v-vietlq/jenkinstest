<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Page\PageRepository;
use App\Http\Requests\Page\StoreRequest;
use App\Http\Requests\Page\UpdateRequest;
use App\Http\Controllers\Controller;

/**
 * Class PageController
 * @package App\Http\Controllers\Admin
 */

class PageController extends Controller
{
    /**
     * @var ViewPath
     */
    private $view = 'admin.modules.page.';

    /**
     * @var RouteName
     */
    private $route = 'admin.page.';

    /**
     * @var Message
     */
    private $message = 'message.page.';

    /**
     * @var PageRepository
     */
    private $page;

    /**
     * PageController constructor.
     * @param PageRepository $page
     */
    public function __construct(PageRepository $page)
    {
        $this->page = $page;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pages'] = $this->page->getAllNoLimit();
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
        $this->page->create($data);

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
        $data['page'] = $this->page->getById($id);
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
        $this->page->update($data,$id);

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
        $this->page->remove($id);
        return redirect()->route($this->route.'index')->with('success',__($this->message.'delete_success'));
    }
}
