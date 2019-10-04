<?php
/**
 * Class AbstractInterface.
 */
namespace App\Repositories;

interface AbstractInterface
{
    /**
     * @param $id
     * @return mixed
     */
    public function getById($id);

    /**
     * @param int $limit
     * @return mixed
     */
    public function getAll($limit = 10);

    /**
     * @return mixed
     */
    public function getAllNoLimit();

    /**
     * @param array $attributes
     * @param $id
     * @param bool $getDataBack
     * @return mixed
     */
    public function update(array $attributes, $id, $getDataBack = false);

    /**
     * @param $id
     * @return mixed
     */
    public function remove($id);

    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes);
}
