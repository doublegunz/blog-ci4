<?php namespace App\Domain\Exception;

use DomainException;

class RecordNotFoundException extends DomainException
{
    protected function __construct(string $message)
    {
        $this->message = $message;        
    }
}