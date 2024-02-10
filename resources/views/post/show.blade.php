<x-app-layout title="{{ clean($post->title) }}">
    <x-container>
        <div class="md:px-40">
            <div class="mb-5">
                <h5 class="text-gray-700 mb-2 font-semibold dark:text-blue-500">{{ $post->user->name }}</h5>
                <h1 class="text-2xl md:text-4xl font-bold dark:text-gray-200">{!! $post->title !!}</h1>
                <h5 class="text-gray-700 text-sm dark:text-gray-500">Publish at {{ $post->created_at->format('d F Y') }}
                </h5>
            </div>
            <div class="dark:text-gray-400 blog ">
                <p class=" first-letter:text-3xl dark:text-gray-300 ">{!! $post->content !!}</p>
            </div>
        </div>
    </x-container>


    {{-- detail post --}}
    <section class="py-28 bg-gray-100 dark:bg-gray-900 border-t">
        <div class="py-5 md:ps-5">
            <h4 class="text-center md:text-start  text-2xl font-semibold dark:text-white">Related Posts</h4>
            <p class="text-center md:text-start dark:text-gray-400">Some posts that might you like</p>
        </div>
        <div class="flex gap-10 justify-center items-center flex-col md:flex-row">
            @foreach ($posts as $post)
                <a href="{{ route('posts.show', $post->slug) }}"
                    class="block max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <span
                        class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $post->category->category }}</span>

                    <div class="dark:text-gray-400">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-gray-300">
                            {!! clean($post->title) !!}</h5>
                        <p class="font-normal text-gray-600 ">
                            {!! Str::limit($post->content, 100, ' .......') !!}
                        </p>
                    </div>
                    <small class="text-gray-500 dark:text-gray-400">{{ $post->created_at->diffForHumans() }}</small>
                </a>
            @endforeach
        </div>
    </section>

</x-app-layout>
