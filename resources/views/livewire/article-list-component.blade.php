<div>
    <div class="flex flex-col justify-between px-4 mx-auto max-w-screen-xl ">
        @foreach($articles as $article)
            <x-article
                :title="$article->title"
                :content="$article->content"
                :comments="$article->comments"
            />
        @endforeach

        {{ $articles->links('vendor/livewire/tailwind') }}
    </div>
</div>
