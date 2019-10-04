<?php
namespace App\Repositories\News;

use App\Repositories\AbstractInterface;

interface NewsRepository extends AbstractInterface
{
    public function allNews ();

    public function latestNews ();

    public function hotNews ();

    public function totalItem ();

    public function beforeNews($id);

    public function afterNews($id);

    public function getNewsDetail($id);

    public function footerNews();

    public function newsbyCate($id);
}
