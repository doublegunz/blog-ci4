<?php

namespace App\Controllers;

use App\Models\PostModel;

class Post extends BaseController
{
    /**
     *
     * @var Model
     */
    protected $model;

    public function __construct()
    {
        $this->model = new PostModel();
        $this->helpers = ['form', 'url'];
    }

    public function index()
    {
        $data = [
            'posts' => $this->model->paginate(10),
            'pager' => $this->model->pager,
            'title' => 'POST LIST'
        ];

        return view('posts/index', $data);
    }
}
