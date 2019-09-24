<?php
namespace App\Repositories\Info;

use App\Repositories\AbstractInterface;

interface InfoRepository extends AbstractInterface
{
    public function removeByUserId (int $user_id);
}
