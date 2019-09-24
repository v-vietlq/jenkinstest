<?php

namespace App\Http\Controllers\Site;

use App\Repositories\Category\CategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\News\NewsRepository;
use DB;
use View;

/**
 * Class CategoryController
 * @package App\Http\Controllers\Site
 */

class CategoryController extends Controller
{
    /**
     * @var CategoryRepository
     */
    private $category;
    /**
     * @var NewsRepository
     */
    private $news;

    /**
     * CategoryController constructor.
     * @param CategoryRepository $category
     */
    public function __construct(CategoryRepository $category,NewsRepository $news)
    {
        $this->category = $category;
        $this->news = $news;
        $news_footer = $this->news->footerNews();// Hiển thị tin tức ở footer
        //Danh mục tin tức
        $news_header_by_category = $this->category->headerNews();     
        View::share([
                    'news_footer' => $news_footer, 
                    'news_header_by_category' => $news_header_by_category
                    ]); 
    }


    /**
     * Show all category
     */
    public function index ()
    {
        return view('site.pages.tuyendung.index');
    }
    /**
     * Show detail nhà tuyển dụng
     */
    public function detail ()
    {
        return view('site.pages.tuyendung.detail');
    }

    /**
     * Show tìm kiếm
     */
    public function timkiem ()
    {
        return view('site.pages.search.index');
    }
}
