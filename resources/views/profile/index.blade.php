<x-app-layout title="Profile">



    {{-- user posts --}}
    <div class=" md:px-24 px-4 mt-36 py-4">
        <h2 class="dark:text-gray-400 text-gray-700  font-semibold text-xl md:text-2xl">Your Posts</h2>
        <p class="text-gray-500 text-sm md:text-lg font-light">Control your posts!</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3  dark:text-gray-500 px-4 md:px-24 gap-5">
        @foreach ($posts as $post)
            <a href="{{ route('posts.show', $post->slug) }}"
                class="border rounded border-gray-300 dark:border-gray-500 p-3 shadow">
                <h4 class="font-semibold text-xl dark:text-gray-400 pb-1">{!! $post->title !!}</h4>
                <div class="text-sm">
                    <p>{!! Str::limit($post->content, 70, '....') !!}</p>
                </div>
                <div class="text-xs pt-2 text-gray-400 dark:text-gray-500">
                    {{ $post->created_at->toFormattedDateString() }}
                </div>
                @can('edit post')
                    <div class="flex mt-5 gap-x-2">
                        <form action="{{ route('posts.edit', $post->slug) }}" method="get">
                            @csrf
                            <button type="submit" class="px-3 py-1 bg-blue-600 text-white rounded">Edit</button>
                        </form>
                        <form action="{{ route('posts.destroy', $post->slug) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded">Delete</button>
                        </form>
                    </div>
                @endcan
            </a>
        @endforeach
    </div>


    {{-- profile & password --}}
    <x-container>
        {{-- parent --}}
        <div class="flex flex-wrap md:flex-nowrap">


            {{-- profile --}}
            <div class="w-full">
                <div class="flex flex-col mt-10">
                    <small class="text-gray-600 dark:text-gray-500">Account created at
                        {{ $user->created_at->toFormattedDateString() }}</small>
                    <small class="text-gray-600 dark:text-gray-500"> {{ $user->post->count() }} Posts Published</small>
                </div>
                @if (session()->has('updated'))
                    <div id="toast-default"
                        class="flex items-center w-full max-w-lg p-4 text-gray-200 bg-green-500 rounded-lg shadow dark:text-gray-400 dark:bg-gray-600"
                        role="alert">
                        <div
                            class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-blue-100 rounded-lg dark:bg-blue-800 dark:text-blue-200">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 18 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M15.147 15.085a7.159 7.159 0 0 1-6.189 3.307A6.713 6.713 0 0 1 3.1 15.444c-2.679-4.513.287-8.737.888-9.548A4.373 4.373 0 0 0 5 1.608c1.287.953 6.445 3.218 5.537 10.5 1.5-1.122 2.706-3.01 2.853-6.14 1.433 1.049 3.993 5.395 1.757 9.117Z" />
                            </svg>
                            <span class="sr-only">Fire icon</span>
                        </div>
                        <div class="ms-3 text-sm font-normal">{{ session('updated') }}</div>
                        <button type="button"
                            class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                            data-dismiss-target="#toast-default" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>
                @endif
                <form action="{{ route('profile.update', $user->id) }}" method="post" class="mt-3">
                    @csrf
                    @method('put')
                    <div class="max-w-lg">
                        <div class="mb-5">
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input type="text" id="name" name="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="{{ $user->name }}">
                            @error('name')
                                <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" id="email" name="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="{{ $user->email }}">
                            @error('email')
                                <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </div>


                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                    </div>
                </form>
            </div>

            {{-- password profile --}}
            <div class="w-full mt-5">
                <div class="py-5">
                    <h1 class="text-2xl dark:text-gray-500">Update your Credential</h1>
                </div>
                <form action="{{ route('password.update', Auth::id()) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-4">
                        <label for="current_password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Current
                            Password</label>
                        <input type="password" id="current_password" name="current_password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('current_password')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New
                            Password</label>
                        <input type="password" id="password" name="password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('password')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="password_confirmation"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password
                            Confirmation</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('password_confirmation')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
                    </div>
                </form>
            </div>

        </div>
    </x-container>





</x-app-layout>
