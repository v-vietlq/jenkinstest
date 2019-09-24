<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Employer\EmployerRepository;
use App\Http\Resources\Employer as EmployerResource;;

class AjaxController extends Controller
{
    private $category;

    private $employer;

    public function __construct(CategoryRepository $category,EmployerRepository $employer)
    {
        $this->category = $category;
        $this->employer = $employer;
    }

    public function increasePosition (Request $requst) 
    {
        $id       = $requst->id;
        $position = $this->category->countPosition($id);
        return $position;
    }

    public function updatePosition (Request $requst) 
    {
        $id               = $requst['id'];
        $data['position'] = ($requst['position'] <= 0) ? 1: $requst['position'];
        $this->category->update($data,$id);
    }

    public function searchEmployer (Request $requst)
    {
        $keyword = $requst->keyword;
        $result = $this->employer->search($keyword);
        return $result;
    }
}
