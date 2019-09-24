<?php

namespace App\Http\Controllers\Site;

use App\Repositories\Employer\EmployerRepository;
use App\Repositories\Job\JobRepository;
use App\Repositories\News\NewsRepository;
use App\Repositories\User\UserRepository;
use App\Repositories\Career\CareerRepository;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Category_Job\CategoryJobRepository;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Controllers\Controller;
use DB;
use View;
use DateTime;
use App\Models\Contact;
use App\Http\Requests\Contact\SendContact;

/**
 * Class HomeController
 * @package App\Http\Controllers\Site
 */

class HomeController extends Controller
{
    /**
     * @var UserRepository
     */
    private $user;
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
     * @var CareerRepository
     */
    private $career;
    /**
     * @var CategoryRepository
     */
    private $category;
    /**
     * @var CategoryJobRepository
     */
    private $category_job;

    /**
     * HomeController constructor.
     * @param UserRepository $user
     * @param EmployerRepository $employer
     * @param JobRepository $job
     * @param NewsRepository $news
     * @param CareerRepository $career
     * @param CategoryRepository $category
     * @param CategoryJobRepository $category_job
     */
    public function __construct(UserRepository $user,EmployerRepository $employer,JobRepository $job,NewsRepository $news,CareerRepository $career,CategoryRepository $category,CategoryJobRepository $category_job )
    {
        $this->user = $user;
        $this->employer = $employer;
        $this->job = $job;
        $this->news = $news;
        $this->career = $career;
        $this->category = $category;
        $this->category_job = $category_job;
        $news_footer = $this->news->footerNews();// Hiển thị tin tức ở footer
        //Danh mục tin tức
        $news_header_by_category = $this->category->headerNews();     
        View::share([
                    'news_footer' => $news_footer, 
                    'news_header_by_category' => $news_header_by_category
                    ]); 
    }

    /**
     * Show function in homepage
     */
    public function index ()
    {
        $data['careers'] = $this->category->getCareer(2); // Select vị trí cần tìm

        $data['category'] = $this->category->getCategoryByParent(1); // Radio check left-side

        $data['job'] = $this->job->allJob(); // Tất cả công việc

        /* $search_key = 'Vien';
        $career_position = '8';  */    
        return view('site.pages.home.dashboard',$data);
    }
    public function detail($slug,$id){
        $data['job_detail'] = $this->job->getJobDetail($id);
        $get_id = $data['job_detail'];
        $id = $get_id['id']; // id của job
        $data['related_job'] = $this->job->relatedJob($id);
        return view('site.pages.job.detail',$data);
    }

    public function contact(Request $request,$slug,$id){
        $data['job_detail'] = $this->job->getJobDetail($id);
        $get_id = $data['job_detail'];
        $id = $get_id['id']; // id của job
        $data['related_job'] = $this->job->relatedJob($id);

        $contact = new Contact;
        $contact->name = $request->fullname;
        $contact->email = $request->txtemail;
        $contact->address = $request->txtaddress;
        $contact->phone = $request->txtphone;
        $contact->content = $request->message;
        $contact->save(); 
        /* $data['contact'] = DB::table('contact')->insert(
            [
                'name' => $request->fullname, 
                'email' => $request->txtemail, 
                'address' => $request->txtaddress, 
                'phone' => $request->txtphone, 
                'content' => $request->message,
            ]
        );  */
        
        return redirect()->back()->withSuccess('The request has been sent to the admin');;
    }

}
