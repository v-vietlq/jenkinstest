<?php

namespace App\Http\Controllers\Site;

use App\Repositories\Job\JobRepository;
use App\Repositories\News\NewsRepository;
use App\Repositories\Category\CategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use View;

class JobController extends Controller
{
    /**
     * @var JobRepository
     */
    private $job;
    /**
     * @var NewsRepository
     */
    private $news;
    /**
     * @var CategoryRepository
     */
    private $category;

    /**
     * JobController constructor.
     * @param JobRepository $job
     */
    /**
     * JobController constructor.
     * @param NewsRepository $news
     */
    /**
     * JobController constructor.
     * @param CategoryRepository $category
     */
    public function __construct(JobRepository $job,NewsRepository $news,CategoryRepository $category)
    {
        $this->job = $job;
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

    /**
     * Show all job
     */
    public function index ()
    {
        return view('site.pages.job.index');
    }
    /**
     * Show detail job
     */
    public function detail ()
    {
        return view('site.pages.job.detail');
    }



    /**
     * Show detail of job
     * @param $slug
     */
    // public function detail ($slug)
    // {

    // }

    /**
     * Apply CV for job
     */
    public function apply () {

    }


}
