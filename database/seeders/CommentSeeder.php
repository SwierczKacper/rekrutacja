<?php

namespace Database\Seeders;

use App\Jobs\API\FetchArticlesJob;
use App\Jobs\API\FetchCommentsJob;
use App\Models\Article;
use App\Services\APICommunicationService;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    protected const API_ENDPOINT = '/comments';

    public function run(): void
    {
        $this->command->info('Starting to fetch comments.');

        FetchCommentsJob::dispatch(self::API_ENDPOINT);

        $this->command->info('Added fetching comments job to the queue.');
    }
}
