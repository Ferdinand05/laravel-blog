<x-app-layout title="Blog">
    <div class="border-b">
        <x-container>
            <section class="bg-white dark:bg-gray-900">
                <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
                    <div class="mr-auto place-self-center lg:col-span-7">
                        <h1
                            class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-blue-600">
                            Create your own personal <span class="text-blue-600 dark:text-gray-200">Blog.</span></h1>
                        <p
                            class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sapiente cumque provident veniam
                            expedita nostrum ratione id eius, sequi dicta voluptatibus?</p>
                        <a href="{{ route('posts.create') }}"
                            class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                            Get started
                            <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                    <div class="hidden lg:mt-0 lg:col-span-5 lg:flex ">
                        <img src="/img/blog.jpg" alt="mockup"
                            class="w-full rounded-tl-full rounded-bl-full dark:grayscale">
                    </div>
                </div>
            </section>
        </x-container>
    </div>

    {{-- posts --}}
    <div>
        <x-container>
            <div class="dark:text-white">
                <h1 class="text-3xl font-semibold">Posts </h1>
                <p class="text-lg font-light dark:text-gray-400">Some posts that users created.</p>
            </div>
            {{-- posts --}}
            <section class="mt-10 grid grid-cols-1 gap-y-5 md:grid-cols-2 lg:grid-cols-3 md:gap-5">

                @foreach ($posts as $post)
                    <a href="{{ route('posts.show', $post->slug) }}"
                        class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <span
                            class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $post->category->category }}</span>

                        <div class="dark:text-gray-400">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-gray-200">
                                {!! clean($post->title) !!}</h5>
                            <p class="font-normal text-gray-600 dark:text-gray-300">
                                {!! clean(Str::limit($post->content, 150, ' ....')) !!}
                            </p>
                        </div>
                        <small class="text-gray-500 dark:text-gray-400">{{ $post->created_at->diffForHumans() }}</small>
                    </a>
                @endforeach

            </section>
            {{-- paginate --}}
            <div class=" mt-7">
                {{ $posts->links() }}
            </div>

        </x-container>
    </div>


</x-app-layout>
