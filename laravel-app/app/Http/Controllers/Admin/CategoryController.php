<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Category\CategoryRepository;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;

use App\Http\Controllers\Controller;

/**
 * Class CategoryController
 * @package App\Http\Controllers\Admin
 */

class CategoryController extends Controller
{
    /**
     * @var ViewPath
     */
    private $view = 'admin.modules.category.';

    /**
     * @var RouteName
     */
    private $route = 'admin.category.';

    /**
     * @var Message
     */
    private $message = 'message.category.';

    /**
     * @var CategoryRepository
     */
    private $category;

    /**
     * CategoryController constructor.
     * @param CategoryRepository $category
     */
    public function __construct(CategoryRepository $category)
    {
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = $this->category->getAllByPosition();
        return view($this->view.'index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['position'] = $this->category->countPosition(0);
        $data['category'] = $this->category->getAllByPosition();
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
        $data             = $request->all();
        $data['status']   = ($request->status == "on") ? "on": "off";
        $data['value_vi'] = str_slug($request->name_vi);
        $data['value_en'] = str_slug($request->name_en);
        $this->category->create($data);

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
        $data['category'] = $this->category->getById($id);
        $data['parent'] = $this->category->getAllByPosition();
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
        $data             = $request->except(['_token','_method','btnSave','btnSaveClose']);
        $data['status']   = ($request->status == "on") ? "on": "off";
        $data['value_vi'] = str_slug($request->name_vi);
        $data['value_en'] = str_slug($request->name_en);
        $this->category->update($data,$id);

        if ($request->btnSave) {
            return redirect()->route($this->route.'edit',['id' => $id])->with('success',__($this->message.'edit_success'));
        } else {
            return redirect()->route($this->route.'index')->with('success',__($this->message.'create_success'));
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
        if ($this->category->countChildCate($id) <= 0) {
            $this->category->remove($id);
            return redirect()->route($this->route.'index')->with('success',__($this->message.'delete_success'));
        } else {
            return redirect()->route($this->route.'index')->with('warning',__($this->message.'delete_fail'));
        }
    }
}
