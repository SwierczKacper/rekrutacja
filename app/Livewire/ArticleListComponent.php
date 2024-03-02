<?php

namespace App\Livewire;

use App\Repositories\ArticleRepository;
use Livewire\Component;
use Livewire\WithPagination;

class ArticleListComponent extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.article-list-component')->with([
            'articles' => (new ArticleRepository())->paginate(eagerLoadRelations: ['comments']),
        ]);
    }
}
