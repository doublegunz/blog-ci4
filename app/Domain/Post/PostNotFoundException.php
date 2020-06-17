<?php namespace App\Domain\Post;

use App\Domain\Exception\RecordNotFoundException;

class PostNotFoundException extends RecordNotFoundException
{
    public final static function forPostDoesnotExistOfId(int $id): self
    {
        return new self(sprintf(
            'The post with post id %d you requested does not exist.', $id
        ));
    }
}