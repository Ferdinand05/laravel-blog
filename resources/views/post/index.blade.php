<x-app-layout title="Post">
    <x-container>
        <div class="flex justify-between items-center dark:text-white">
            <div>
                <h1 class="text-3xl font-bold">Create Post</h1>
                <p class=" font-light">Control your own post. Fast and Secure</p>
            </div>
            <div>
                <a href="{{ route('posts.create') }}"
                    class="bg-green-500 hover:bg-green-600 rounded duration-300 text-white py-1 px-4">Create</a>
            </div>
        </div>

        {{-- table data --}}


        <div class="relative overflow-x-auto mt-10">
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
