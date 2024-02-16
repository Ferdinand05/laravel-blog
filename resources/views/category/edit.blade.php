<x-app-layout title="Create Category">
    <x-container>

        <div>
            {{ Breadcrumbs::render('categories.edit', $category) }}
        </div>

        <div class="flex items-center gap-x-10 my-9 justify-between">
            <h1 class="font-bold text-3xl dark:text-gray-300">Edit Category <span
                    class="text-gray-500">{{ $category->category }}</span></h1>
            <a href="{{ route('categories.index') }}"
                class="bg-red-600 hover:bg-red-700 text-white rounded py-1 px-3">Back</a>
        </div>
        <form class=" max-w-lg" action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="category" id="floating_email"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " value="{{ old('category', $category->category) }}" />
                <label for="floating_email"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Category
                    name</label>
                @error('category')
                    <small class="text-red-600">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>
    </x-container>
</x-app-layout>
