<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Content\ContentRepository;
use App\Repositories\Page\PageRepository;
use App\Http\Requests\Content\StoreRequest;
use App\Http\Requests\Content\UpdateRequest;
use App\Http\Controllers\Controller;

/**
 * Class ContentController
 * @package App\Http\Controllers\Admin
 */

class ContentController extends Controller
{
    /**
     * @var ViewPath
     */
    private $view = 'admin.modules.content.';

    /**
     * @var RouteName
     */
    private $route = 'admin.content.';

    /**
     * @var Message
     */
    private $message = 'message.content.';

    /**
     * @var ContentRepository
     */
    private $content;

    /**
     * @var PageRepository
     */
    private $page;

    /**
     * ContentController constructor.
     * @param ContentRepository $content
     */
    public function __construct(PageRepository $page,ContentRepository $content)
    {
        $this->content = $content;
        $this->page = $page;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($pageid)
    {
        $data['pages']  = $this->page->getContentByPage($pageid);
        $data['pageid'] = $pageid;

        return view($this->view.'index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($pageid)
    {
        $data['pageid'] = $pageid;
        $data['pages']  = $this->page->getAllNoLimit();

        return view('admin.modules.content.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request,$pageid)
    {
        $data = $request->all();
        $this->content->create($data);

        if ($request->btnSave) {
            return redirect()->route($this->route.'create',['pageid' => $pageid])->with('success',__($this->message.'create_success'));
        } else {
            return redirect()->route($this->route.'index',['pageid' => $pageid])->with('success',__($this->message.'create_success'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($pageid,$id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($pageid,$id)
    {
        $data['pageid']  = $pageid;
        $data['id']      = $id;
        $data['pages']   = $this->page->getAllNoLimit();
        $data['content'] = $this->content->getById($id);

        return view('admin.modules.content.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request,$pageid, $id)
    {
        $data           = $request->except(['_token','_method','btnSave','btnSaveClose']);
        $this->content->update($data,$id);

        if ($request->btnSave) {
            return redirect()->route($this->route.'edit',['pageid' => $pageid,'id' => $id])->with('success',__($this->message.'edit_success'));
        } else {
            return redirect()->route($this->route.'index',['pageid' => $pageid])->with('success',__($this->message.'edit_success'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($pageid,$id)
    {
        $this->content->remove($id);

        return redirect()->route($this->route.'index',['pageid' => $pageid])->with('success',__($this->message.'delete_success'));
    }
}
