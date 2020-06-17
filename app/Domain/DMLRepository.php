<?php namespace App\Domain;

interface DMLRepository
{
    public function save(array $data): bool;
    public function deleteOfId(int $id): bool;
}