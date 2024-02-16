<x-app-layout title="Categories | Blogger">

    <x-container>
        <div>
            {{ Breadcrumbs::render('categories') }}
        </div>
        <div class="flex  w-full my-10 items-center justify-between">
            <div class="">
                <h1 class="text-4xl font-bold dark:text-gray-200">Our Categories</h1>
                <p class="dark:text-gray-400">Control and create your category.</p>
            </div>
            <div>
                <a href="{{ route('categories.create') }}"
                    class=" text-white font-medium py-2 px-4 bg-green-500 rounded hover:bg-green-600">Create
                    Category</a>
            </div>
        </div>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Category Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Used
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
                        $i = ($categories->currentPage() - 1) * $categories->perPage() + 1;

                    @endphp
                    @foreach ($categories as $category)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $i++ }}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $category->category }}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $category->post->count() }}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $category->created_at->toFormattedDateString() }}
                            </th>
                            {{-- action --}}
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <div class="flex gap-x-2">
                                    {{-- delete --}}
                                    <div>
                                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class=" hover:bg-red-600 bg-red-500 rounded px-4 py-1"
                                                title="Delete" type="submit"> <svg
                                                    class="w-6 h-6 text-white dark:text-white" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                                </svg></button>
                                        </form>
                                    </div>
                                    {{-- edit --}}
                                    <div>
                                        <a href="{{ route('categories.edit', $category->id) }}"
                                            class=" hover:bg-sky-600 bg-sky-500 rounded px-4 py-1 inline-block"
                                            title="Edit"><svg class="w-6 h-6 text-white dark:text-white"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m14.3 4.8 2.9 2.9M7 7H4a1 1 0 0 0-1 1v10c0 .6.4 1 1 1h11c.6 0 1-.4 1-1v-4.5m2.4-10a2 2 0 0 1 0 3l-6.8 6.8L8 14l.7-3.6 6.9-6.8a2 2 0 0 1 2.8 0Z" />
                                            </svg></a>
                                    </div>

                                </div>
                            </th>
                        </tr>
                    @endforeach

                </tbody>
            </table>

            <div class="mt-7">

                {{ $categories->links('pagination::simple-tailwind') }}
            </div>
        </div>
    </x-container>

</x-app-layout>
