<?php namespace App\Domain\Post;

use CodeIgniter\Entity;

class Post extends Entity
{
    protected $atributes = [
        'id' => null,
        'title' => null,
        'content' => null,
        'slug' => null,
        'status' => null,
    ];

    public function setTitle(string $title): self
    {
        $this->attributes['title'] = $title;
        return $this;
    }

    public function setContent(string $content): self
    {
        $this->attributes['content'] = $content;
        return $this;
    }

    public function setSlug(string $title): self
    {
        $this->atributes['slug'] = url_title(strtolower($title));
        return $this;
    }

    public function setStatus(int $status): self
    {
        $this->attributes['status'] = $status;
        return $this;
    }
}