<?php namespace App\Models;

use App\Domain\Post\Post;
use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table = 'posts';
    protected $returnType = Post::class;
    protected $allowedFields = [
        'title', 
        'slug', 
        'content', 
        'status'
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    protected $validationRules = [
        'title' => 'required|alpha_numeric_space|min_length[3]|max_length[255]|is_unique[posts.title,id,{id}]',
        'content' => 'required',
        'status' => 'required'
    ];

    protected $skipValidation = false;

    protected $beforeInsert = ['createSlug'];
    protected $beforeUpdate = ['createSlug'];

    protected function createSlug(array $data)
    {
        $data['data']['slug'] = url_title(strtolower($data['data']['title']));
        return $data;
    }
}
