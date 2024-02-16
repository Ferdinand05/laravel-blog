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
            <div class="dark:text-white py-3">
                <h1 class="text-3xl font-semibold">Posts </h1>
                <p class="text-lg font-light dark:text-gray-400">Some posts that users created.</p>
            </div>
            {{-- search --}}

            <form method="get" action="{{ route('blog') }}">
                @csrf
                <label for="default-search"
                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" id="default-search"
                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Whats on your mind..." name="posts">
                    <button type="submit"
                        class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                </div>
                {{-- total --}}
                <small class="dark:text-gray-500 text-gray-400">
                    {{ $posts->total() }} Related Posts
                </small>
            </form>


            {{-- posts --}}
            <section class="mt-10 grid grid-cols-1 gap-y-5 md:grid-cols-2 lg:grid-cols-3 md:gap-5">

                @foreach ($posts as $post)
                    <div
                        class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

                        <a href="{{ route('posts.show', $post->slug) }}">
                            <img class="rounded-t-lg" src="/storage/{{ $post->content_image }}"
                                alt="{{ $post->title }}" />
                        </a>
                        <div class="p-5">
                            <span
                                class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $post->category->category }}</span>
                            <a href="{{ route('posts.show', $post->slug) }}">
                                <h5
                                    class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white dark:hover:text-blue-500 hover:text-blue-700 hover:duration-300">
                                    {!! $post->title !!}</h5>
                            </a>
                            <div class="blog dark:text-gray-500">
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                    {!! Str::limit($post->content, 100, '...') !!}</p>
                            </div>
                            <small class="text-gray-500">{{ $post->created_at->diffForHumans() }}</small>
                        </div>
                    </div>
                @endforeach

            </section>
            {{-- paginate --}}
            <div class=" mt-7">
                {{ $posts->links() }}

            </div>

        </x-container>
    </div>


</x-app-layout>
