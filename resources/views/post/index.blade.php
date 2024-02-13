<x-app-layout title="Post">
    <x-container>
        <div class="flex justify-between items-center dark:text-white mb-5">
            <div>
                <h1 class="text-3xl font-bold">Create Post</h1>
                <p class=" font-light">Control your own post. Fast and Secure</p>
            </div>
            <div>
                <a href="{{ route('posts.create') }}"
                    class="bg-green-500 hover:bg-green-600 rounded duration-300 text-white py-1 px-4">Create</a>
            </div>
        </div>

        {{-- search input --}}

        <div>
            <form action="{{ route('posts.index') }}" method="get">
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
                        placeholder="Search by Title,Content,Author..." name="keyword">
                    <button type="submit"
                        class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                </div>
            </form>
            <small class="dark:text-gray-600">{{ $posts->total() }} Found</small>
        </div>

        {{-- table data --}}


        <div class="relative overflow-x-auto mt-5">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-600 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Title
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Author
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Created at
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = ($posts->currentPage() - 1) * $posts->perPage() + 1;
                    @endphp
                    @foreach ($posts as $post)
                        <tr class="bg-white dark:bg-gray-800">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $i++ }}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $post->title }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $post->author }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $post->category->category }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $post->created_at->toFormattedDateString() }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex gap-x-2">
                                    <a href="{{ route('posts.edit', $post->slug) }}"
                                        class="text-blue-500 font-semibold hover:underline">Edit</a>
                                    <div>
                                        <form action="{{ route('posts.destroy', $post->slug) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="text-red-600 font-semibold hover:underline">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-5">
            {{ $posts->links('pagination::tailwind') }}
        </div>


    </x-container>
</x-app-layout>
