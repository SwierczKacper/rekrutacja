<?php

namespace App\Jobs\API;

use App\Command\CommandBusInterface;
use App\Command\CreateArticleCommand;
use App\DTO\ArticleDTO;
use App\Services\APICommunicationService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class FetchArticlesJob implements ShouldQueue
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

    public function handle(): void
    {
        $commandBus = app(CommandBusInterface::class);
        $results = (new APICommunicationService())->get($this->endpoint);

        foreach($results as $result) {
            $commandBus->dispatch(new CreateArticleCommand(
                new ArticleDTO(
                    api_id: $result['id'],
                    title: $result['title'],
                    content: $result['body'],
                )
            ));
        }
    }
}
