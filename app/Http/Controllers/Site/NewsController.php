<?php

namespace App\Http\Controllers\Site;

use App\Repositories\News\NewsRepository;
use App\Repositories\Category\CategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use View;

/**
 * Class NewsController
 * @package App\Http\Controllers\Site
 */

class NewsController extends Controller
{
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
    /**
     * NewsController constructor.
     * @param CategoryRepository $category
     */
    public function __construct(NewsRepository $news,CategoryRepository $category)
    {
        $this->news = $news;
        $this->category = $category;

        $latest_news = $this->news->latestNews(); // tin mới nhất
        $hot_news = $this->news->hotNews(); // tin nổi bật
        $news_footer = $this->news->footerNews();// Hiển thị tin tức ở footer
        //Danh mục tin tức
        $news_header_by_category = $this->category->headerNews();     
        View::share([
                    'news_footer' => $news_footer, 
                    'news_header_by_category' => $news_header_by_category,
                    'latest_news' => $latest_news,
                    'hot_news' => $hot_news
                    ]); 
    }


    /**
     * Show all news
     */
    public function index ()
    {
        $data['news'] = $this->news->allNews();//tất cả tin
        return view('site.pages.blog.index',$data);
    }
    // detail tin tức
    public function chitiet ($slug,$id)
    {
        $data['news_detail'] = $this->news->getNewsDetail($id); // Chi tiết tin
        $data['before_news'] = $this->news->beforeNews($id);
        $data['after_news'] = $this->news->afterNews($id);
        return view('site.pages.blog.detail',$data);
    }

    public function news_by_cate($id){
        $data['news_by_cate'] = $this->news->newsbyCate($id);
        return view('site.pages.blog.newscate',$data);
    }

    /**
     * Show detail of news
     * @param $slug
     */

    public function detail ($slug)
    {

    }
}
