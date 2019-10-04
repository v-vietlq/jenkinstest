<?php
namespace App\Repositories\Page;

use App\Repositories\AbstractInterface;

interface PageRepository extends AbstractInterface
{
    public function getIntroductPage();

    public function getContentByPage ($id);
}
