<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\News\NewsRepository;
use App\Repositories\Category\CategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\News\StoreRequest;
use App\Http\Requests\News\UpdateRequest;

/**
 * Class NewsController
 * @package App\Http\Controllers\Admin
 */

class NewsController extends Controller
{
    /**
     * @var ViewPath
     */
    private $view = 'admin.modules.news.';

    /**
     * @var RouteName
     */
    private $route = 'admin.news.';

    /**
     * @var Message
     */
    private $message = 'message.news.';

    /**
     * @var NewsRepository
     */
    private $news;

    /**
     * @var CategoryRepository
     */
    private $category;

    /**
     * NewsController constructor.
     * @param NewsRepository $news
     */
    public function __construct(NewsRepository $news,CategoryRepository $category)
    {
        $this->news = $news;
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['news'] = $this->news->getAllNoLimit();
        return view($this->view.'index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $data           = $request->all();
        $data['status'] = ($request->status == "on") ? "on": "off";
        $data['featured'] = ($request->status == "on") ? "on": "off";

        $this->news->create($data);

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
        $data['news'] = $this->news->getById($id);
        $data['category'] = $this->category->getAllByPosition();
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
        $data['featured'] = ($request->status == "on") ? "on": "off";

        $this->news->update($data,$id);

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
        $this->news->remove($id);
        return redirect()->route($this->route.'index')->with('success',__($this->message.'delete_success'));
    }
}
