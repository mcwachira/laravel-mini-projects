<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-8">
                <div class="p-4 text-gray-900 dark:text-gray-100">


                    <ul class="flex flex-wrap text-sm font-medium text-center text-body justify-center">
                        <li class="me-2">
                            <a href="#" class="inline-block px-4 py-2.5 text-white bg-brand rounded-base active" aria-current="page">All</a>
                        </li>
                       @foreach($categories as $category)


                            <li class="me-2">
                                <a href="#" class="inline-block px-4 py-2.5 text-white bg-brand rounded-base active" aria-current="page">
                                    {{$category->name}}

                                </a>
                            </li>

                       @endforeach
                    </ul>
                </div>
            </div>

            <div class="mt-8 flex flex-col gap-8">



                @forelse ($posts as $post)
                    <div class="flex bg-white dark:bg-gray-800 border border-gray-200
                dark:border-gray-700 rounded-xl shadow-sm
                hover:shadow-md hover:-translate-y-1 transition-all duration-200">
                        {{-- LEFT CONTENT --}}
                        <div class="p-5 flex-1">
                            <a href="#">
                                <h3 class="mb-3 text-4xl font-bold tracking-tight text-white hover:text-blue-600 transition">
                                    {{ $post->title }}
                                </h3>
                            </a>

                            <p class="mb-6 text-gray-700 dark:text-gray-300 leading-relaxed line-clamp-4">
                                {{ Str::words($post->content, 20) }}
                            </p>

                            <a href="#"
                               class="inline-flex items-center bg-blue-600 dark:bg-blue-800 hover:underline font-medium text-lg rounded-lg dark:focus:ring-blue-800">
                                Read more
                                <svg class="w-4 h-4 ml-2 rtl:rotate-180"
                                     fill="none" stroke="currentColor" stroke-width="2"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>

                        {{-- RIGHT IMAGE --}}
                        <a href="#" class="h-full">
                            <img class="rounded-lg w-48 h-full object-cover"
                                 src="https://flowbite.com/docs/images/blog/image-1.jpg"
                                 alt="Post image">
                        </a>
                    </div>
                @empty
                    <p class="text-center py-16">No Post Found.</p>
                @endforelse
            </div>

            <div class="mt-8">
                {{ $posts->onEachSide(1)->links() }}
            </div>
                </div>
    </div>
</x-app-layout>
