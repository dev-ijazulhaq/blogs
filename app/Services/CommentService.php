<?php

namespace App\Services;

use App\Models\Comment;
use App\Repositories\Interfaces\CommentRepositoryInterface;

class CommentService
{
    protected CommentRepositoryInterface $commentInterface;
    /**
     * Create a new class instance.
     */
    public function __construct(CommentRepositoryInterface $commentInterface)
    {
        $this->commentInterface = $commentInterface;
    }

    public function create(array $attributes): Comment
    {
        return $this->commentInterface->create($attributes);
    }

    public function getComment(string $id): Comment
    {
        return $this->commentInterface->findOrFail($id);
    }

    public function updateComment(array $attributes, string $id): Comment
    {
        return $this->commentInterface->update($attributes, $id);
    }

    public function delete(string|int $id): bool
    {
        return $this->commentInterface->delete($id);
    }
}
