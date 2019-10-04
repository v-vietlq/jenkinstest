<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Page\PageRepository;
use App\Repositories\News\NewsRepository;
use App\Repositories\Category\CategoryRepository;
use DB;
use View;

/**
 * Class AboutController
 * @package App\Http\Controllers\Site
 */

class AboutController extends Controller
{
    /**
     * @var PageRepository
     */
    private $page;
    /**
     * @var NewsRepository
     */
    private $news;
    /**
     * AboutController constructor.
     */
    private $category;
    /**
     * CategoryRepository constructor.
     */
    public function __construct(PageRepository $page,NewsRepository $news,CategoryRepository $category)
    {
        $this->page = $page;
        $this->news = $news;
        $this->category = $category;

        $news_footer = $this->news->footerNews();// Hiển thị tin tức ở footer
        //Danh mục tin tức
        $news_header_by_category = $this->category->headerNews();     
        View::share([
                    'news_footer' => $news_footer, 
                    'news_header_by_category' => $news_header_by_category
                    ]); 
    }

    public function index () {
        $data['page'] = $this->page->getIntroductPage();// Trang giới thiệu
        $data['latest_news'] = $this->news->latestNews(); // tin mới nhất
        $data['hot_news'] = $this->news->hotNews(); // tin nổi bật
        return view('site.pages.introduct.index',$data);
    }
}
