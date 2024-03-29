<x-app-layout title="Create Post">
    <x-container>
        <div>
            {{ Breadcrumbs::render('create.post') }}
        </div>
        <div class="pb-10">
            <div class="dark:text-white">
                <h1 class="text-3xl font-bold">Create your own post</h1>
                <p class="font-light text-start">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusamus,
                    facere.
                </p>
            </div>
        </div>

        {{-- form --}}
        <section>
            <form class="max-w-xl" action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-5">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Title</label>
                    <input type="text" id="title" name="title"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Content title" value="{{ old('title') }}">
                    @error('title')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Text
                        content</label>
                    <textarea id="content" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Content" name="content">{{ old('content') }}</textarea>
                    @error('content')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-5">

                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload
                        file</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="file_input_help" id="file_input" type="file" name="content_image">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG, JPG or JPEG</p>
                    @error('content_image')
                        <small class="text-red-600">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category
                        post</label>
                    <select id="category" name="category"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected disabled>- Category -</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </form>

        </section>

    </x-container>
</x-app-layout>
