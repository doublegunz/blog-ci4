<?php namespace App\Controllers;

use App\Domain\Post\PostRepository;
use App\Domain\Exception\RecordNotFoundException;
use App\Models\PostModel;
use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;
use Config\Services;

class Home extends BaseController
{

	protected $repository;

	public function __construct()
	{
		$this->repository = Services::postRepository();
		$this->helpers = ['form', 'url'];		
	}


	public function index()
	{
		$keyword = $this->request->getGet('keyword') ?? '';

		$data = [
			'posts' => $this->repository->findPaginatedData($keyword),
			'pager' => model(PostModel::class)->pager,
			'title' => 'Home | re:code blog'
		];

		
		return view('pages/home', $data);
	}

}
