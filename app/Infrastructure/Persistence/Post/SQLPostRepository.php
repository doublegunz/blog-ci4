<?php namespace App\Infrastructure\Persistence\Post;

use App\Domain\Post\Post;
use App\Domain\Post\PostNotFoundException;
use App\Domain\Post\PostRepository;
use App\Infrastructure\Persistence\DMLPersistence;
use App\Models\PostModel;

class SQLPostRepository implements PostRepository
{
    use DMLPersistence;

    protected $model;

    public function __construct(PostModel $model)
    {
        $this->model = $model;
        
    }

    public function findPaginatedData(string $keyword = ''): ?array
    {
        if ($keyword) {
            $this->model
                ->builder()
                ->groupStart()
                    ->like('title', $keyword)
                ->groupEnd();

        }

        return $this->model->paginate(config('Post')->paginationPerPage);
    }

    public function findPostOfId(int $id): Post
    {
        $post = $this->model->find($id);
        if (! $post instanceof Post) {
            throw PostNotFoundException::forPostDoesnotExistOfId($id);
        }

        return $post;
    }

    public function deleteOfId(int $id): bool
    {
        $delete = $this->model->delete($id);
        if ($this->model->db->affectedRows() === 0) {
            # code...
            throw PostNotFoundException::forPostDoesnotExistOfId($id);
        }

        return true;
    }
}