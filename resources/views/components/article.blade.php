@props([
	'title' => null,
	'content' => null,
	'comments' => null,
])

<article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
    <header class="mb-4 lg:mb-6 not-format">
        <address class="flex items-center mb-6 not-italic">
            <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                <img class="mr-4 w-16 h-16 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Jese Leos">
                <div>
                    <a href="#" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">John Doe</a>
                </div>
            </div>
        </address>
        <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">{{ $title }}</h1>
    </header>
    <p class="lead">{{ $content }}</p>

    <section class="not-format">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white mt-4">Discussion ({{ $comments->count() }})</h2>
        </div>

        @foreach($comments as $comment)
            <x-comment
                :name="$comment->name"
                :comment="$comment->comment"
            />
        @endforeach
    </section>
</article>
