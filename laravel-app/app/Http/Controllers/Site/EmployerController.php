<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Employer\EmployerRepository;
use  App\Repositories\Job\JobRepository;
use App\Repositories\News\NewsRepository;
use App\Repositories\Category\CategoryRepository;
use DB;
use View;
class EmployerController extends Controller
{
    /**
     * @var EmployerRepository
     */
    private $employer;
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
     * EmployerRepository constructor.
     * @param EmployerRepository $employer
     */
    /**
     * JobRepository constructor.
     * @param JobRepository $job
     */
    /**
     * JobRepository constructor.
     * @param NewsRepository $news
     */
    /**
     * JobRepository constructor.
     * @param CategoryRepository $category
     */
    public function __construct(EmployerRepository $employer,JobRepository $job,NewsRepository $news,CategoryRepository $category)
    {
        $this->employer = $employer;
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
     * Show all nhà tuyển dụng
     */
    public function index ()
    {
        $data['employer'] = $this->employer->getAllEmployer();
        return view('site.pages.tuyendung.index',$data);
    }
    /**
     * Show detail nhà tuyển dụng
     */
    public function detail ($slug,$id)
    {
        $data['detail_employer'] = $this->employer->getEmployerDetail($id); // Chi tiết nhà tuyển dụng
        $data['job_by_employer'] =  $this->job->jobByEmployer($id); // Công việc đã đăng của nhà tuyển dụng
        //dd( $data['job_by_employer']);
        return view('site.pages.tuyendung.detail',$data);
    }
}
