<?php namespace App\Controllers;

use App\Models\PostModel;

class Home extends BaseController
{

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
			'title' => 'Home | re:code blog'
		];

		return view('pages/home', $data);
	}

	public function detail(int $id)
	{
		$post = $this->model->find($id);

		if (! empty($post)) {
			$data = [
				'title' => $post['title'],
				'post' => $post
			];
			
			return view('pages/detail', $data);
		}
	}

}
