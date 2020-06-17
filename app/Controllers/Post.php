<?php namespace App\Controllers;

use App\Domain\Exception\RecordNotFoundException;
use App\Models\PostModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use Config\Services;

class Post extends BaseController
{
    
    protected $repository;

    public function __construct()
    {
        $this->repository = Services::postRepository();
        $this->helpers = ['form', 'url'];

    }

    public function detail(int $id)
    {
        try {
            $post = $this->repository->findPostOfId($id);
        } catch (RecordNotFoundException $e) {
            throw PageNotFoundException::forPageNotFound($e->getMessage());
        }

        $data = [
            'title' => $post->title,
            'post' => $post,
        ];

        return view('pages/detail', $data);

    }


}
