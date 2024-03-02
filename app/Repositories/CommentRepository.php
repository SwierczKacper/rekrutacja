<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Comment;

class CommentRepository extends AbstractModelRepository
{
    public function model(): Comment
    {
        return new Comment();
    }
}
