<?php namespace App\Domain\Post;

use App\Domain\DMLRepository;

interface PostRepository extends DMLRepository
{
    public function findPaginatedData(string $keyword = ''): ?array;
    public function findPostOfId(int $id): Post;
}