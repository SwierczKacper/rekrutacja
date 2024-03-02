<?php

namespace Database\Seeders;

use App\Jobs\API\FetchArticlesJob;
use App\Models\Article;
use App\Services\APICommunicationService;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    protected const API_ENDPOINT = '/posts';

    public function run(): void
    {
        $this->command->info('Starting to fetch articles.');

        FetchArticlesJob::dispatch(self::API_ENDPOINT);

        $this->command->info('Added fetching articles job to the queue.');
    }
}
