<x-app-layout title="Home">
    <section class="bg-white dark:bg-gray-900 py-28">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
            <h1
                class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                We invest in the world’s potential</h1>
            <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400">Here at
                Flowbite we focus on markets where technology, innovation, and capital can unlock long-term value and
                drive economic growth.</p>
            <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
                <a href="{{ route('posts.index') }}"
                    class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                    Get started
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
                <a href="#"
                    class="inline-flex justify-center items-center py-3 px-5 sm:ms-4 text-base font-medium text-center text-gray-900 rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                    Learn more
                </a>
            </div>
        </div>
    </section>


    {{-- about --}}
    <section class="bg-gray-100 px-12 py-16 dark:bg-gray-800">

        <p class="text-gray-500 dark:text-gray-300">
            Does your user know how to exit out of screens? Can they follow your intended user journey and buy something
            from the site you’ve designed? By running a usability test, you’ll be able to see how users will interact
            with your design once it’s live.
        </p>
        <blockquote class="p-4 my-4 border-s-4 border-gray-300 bg-gray-50 dark:border-gray-500 dark:bg-gray-800">
            <p class="text-xl italic font-medium leading-relaxed text-gray-900 dark:text-white">"Flowbite is just
                awesome. It contains tons of predesigned components and pages starting from login screen to complex
                dashboard. Perfect choice for your next SaaS application."</p>
        </blockquote>
        <p class="text-gray-500 dark:text-gray-300">
            First of all you need to understand how Flowbite works. This library is not another framework. Rather, it is
            a set of components based on Tailwind CSS that you can just copy-paste from the documentation.
        </p>

        <p class="text-gray-500 dark:text-gray-300 mt-3">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Corrupti itaque, id voluptas quo voluptate
            sapiente dolorum blanditiis molestias aspernatur excepturi error iure dignissimos nisi sed ducimus impedit
            tenetur temporibus autem earum. Quisquam, fugiat. Repellat aliquam veniam nemo? Obcaecati, excepturi debitis
            eos, fugit unde esse laudantium autem quibusdam consectetur velit voluptates repudiandae totam officiis
            similique! Error, recusandae similique id, laborum fuga dolorem eius quia sequi dolorum possimus ad
            consequuntur velit labore veritatis facere nostrum consectetur ipsa aliquam nam? Veniam cum dolorem nemo
            eligendi perferendis rerum aperiam totam possimus neque! Rem provident optio aut veniam cupiditate natus
            voluptatem aliquid ratione! Beatae, nulla!
        </p>

    </section>

</x-app-layout>
