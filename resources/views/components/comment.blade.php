@props([
	'name' => 'John Doe',
	'comment' => 'This is a comment',
])


<article class="p-6 mb-6 text-base bg-white rounded-lg dark:bg-gray-900">
    <footer class="flex justify-between items-center mb-2">
        <div class="flex items-center">
            <p class="inline-flex items-center mr-3 font-semibold text-sm text-gray-900 dark:text-white">
                <img class="mr-2 w-6 h-6 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Michael Gough">{{ $name }}
            </p>
        </div>
    </footer>
    <p>Very straight-to-point article. Really worth time reading. Thank you! But tools are just the
        instruments for the UX designers. The knowledge of the design tools are as important as the
        creation of the design strategy.</p>
</article>
