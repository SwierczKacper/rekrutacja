<?php

namespace App\Jobs\API;

use App\Command\CommandBusInterface;
use App\Command\CreateArticleCommand;
use App\Command\CreateCommentCommand;
use App\DTO\ArticleDTO;
use App\DTO\CommentDTO;
use App\Exceptions\ArticleNotFoundException;
use App\Models\Article;
use App\Repositories\ArticleRepository;
use App\Services\APICommunicationService;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class FetchCommentsJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public $deleteWhenMissingModels = true;

    public $tries = 1;

    public function __construct(
        public string $endpoint,
    )
    {
    }

    /**
     * @throws ArticleNotFoundException
     */
    public function handle(): void
    {
        $commandBus = app(CommandBusInterface::class);
        $results = (new APICommunicationService())->get($this->endpoint);

        foreach($results as $result) {
            $article = $this->findArticleByApiId($result['postId']);

            if($article === null) {
                // if article for that comment not found stop fetching other comments
                throw new ArticleNotFoundException($result['postId']);
            }

            $commandBus->dispatch(new CreateCommentCommand(
                new CommentDTO(
                    article_id: $article->id,
                    name: $result['name'],
                    email: $result['email'],
                    content: $result['body'],
                )
            ));
        }
    }

    private function findArticleByApiId(int $apiId): ?Article
    {
        try {
            return (new ArticleRepository())->findByApiId($apiId);
        } catch (Exception $e) {
            return null;
        }
    }
}
