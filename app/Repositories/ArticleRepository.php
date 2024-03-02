<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Article;

class ArticleRepository extends AbstractModelRepository
{
    public function model(): Article
    {
        return new Article();
    }

    public function firstByApiId(int $api_id): Article|null
    {
        /** @var Article|null $article */
        $article = $this->query()
            ->where('api_id', $api_id)
            ->first();

        return $article;
    }

    public function findByApiId(int $api_id): Article
    {
        /** @var Article|null $article */
        $article = $this->query()
            ->where('api_id', $api_id)
            ->firstOrFail();

        return $article;
    }
}
