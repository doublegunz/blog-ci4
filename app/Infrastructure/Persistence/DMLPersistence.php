<?php namespace App\Infrastructure\Persistence;

use CodeIgniter\Model;

trait DMLPersistence
{
    public function save(array $data = null): bool
    {
        return $this->model instanceof Model &&  $this->model->save(new $this->model->returnType($data));
    }
}