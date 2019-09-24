<?php

namespace App\Repositories;

class AbstractRepository implements AbstractInterface
{
    /**
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return $this->model->where('id', $id)->first();
    }

    /**
     * @param int $limit
     * @return mixed
     */
    public function getAll($limit = 10,$order = 'desc')
    {
        return $this->model->select()
            ->orderBy('created_at', $order)
            ->paginate($limit);
    }

    /**
     * @return mixed
     */
    public function getAllNoLimit($order = 'desc')
    {
        return $this->model->select()
            ->orderBy('created_at', $order)
            ->get();
    }

    /**
     * @param array $attributes
     * @param $id
     * @param bool $getDataBack
     * @return mixed
     */
    public function update(array $attributes, $id, $getDataBack = false)
    {
        $update = $this->model->where('id', $id)->update($attributes);
        if ($getDataBack) {
            $update = $this->getById($id);
        }
        return $update;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function remove($id)
    {
        return $this->model->where('id', $id)->delete();
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        $data = $this->model->create($attributes);
        return $data;
    }
}
