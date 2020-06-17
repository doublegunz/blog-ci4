<?php namespace App\Controllers\Admin;

use App\Domain\Post\PostRepository;
use App\Domain\Exception\RecordNotFoundException;
use App\Models\PostModel;
use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;
use Config\Services;

class Post extends BaseController
{
    private $repository;

    public function __construct()
    {
        $this->repository = Services::postRepository();
        $this->helpers = ['form', 'url']; 
    }

    public function index()
    {
        $data['keyword'] = $this->request->getGet('keyword') ?? '';
        $data['posts'] = $this->repository->findPaginatedData($data['keyword']);
        $data['pager'] = model(PostModel::class)->pager;
        $data['title'] = 'Post Management';

        return view('admin/posts/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'create new post',
            'errors' => session()->getFlashdata('errors')
        ];
        return view('admin/posts/create', $data);
    }

    public function store()
    {
        if ($this->request->getMethod() === 'post') {
            $data = $this->request->getPost();

            if ($this->repository->save($data)) {
                session()->setFlashdata('success', 'New post has beend added');
                return redirect()->route('post-index');
            }

            session()->setFlashdata('errors', model(PostModel::class)->errors());
            return redirect()->withInput()->back();
        }

    }

    public function edit(int $id)
    {
        try {
            $post = $this->repository->findPostOfId($id);
        } catch (RecordNotFoundException $e) {
            throw PageNotFoundException::forPageNotFound($e->getMessage());
        }

        $data = [
            'title' => $post->title,
            'post' => $post,
            'errors' => session()->getFlashdata('errors')
        ];

        return view('admin/posts/edit', $data);
    }

    public function update(int $id)
    {
        try {
            $post = $this->repository->findPostOfId($id);
        } catch (RecordNotFoundException $e) {
            throw PageNotFoundException::forPageNotFound($e->getMessage());
        }

        if ($this->request->getMethod() === 'post') {
         
            $data = $this->request->getPost();

            if ($this->repository->save($data)) {
                session()->setFlashdata('success', 'Post has been updated');
                return redirect()->route('post-index');
            }

            session()->setFlashdata('errors', model(PostModel::class)->errors());
            return redirect()->withInput()->back();
        }
    }

    public function destroy(int $id)
    {
        try {
            $this->repository->deleteOfId($id);
        } catch (RecordNotFoundException $e) {
            //throw $th;
            throw PageNotFoundException::forPageNotFound($e->getMessage());
        }

        session()->setFlashdata('success', 'Post has been deleted');
        return redirect()->route('post-index');
    }
}