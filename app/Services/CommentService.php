<?php

namespace App\Services;

use App\Repositories\Interfaces\CommentRepositoryInterface;

class CommentService
{
    protected CommentRepositoryInterface $commentRepository;
    /**
     * Create a new class instance.
     */
    public function __construct(CommentRepositoryInterface $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }
}
