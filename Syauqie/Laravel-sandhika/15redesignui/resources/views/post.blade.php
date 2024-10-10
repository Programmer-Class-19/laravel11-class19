<x-layout>
    <x-slot:title>{{ $title }}</x-slot>

    {{-- <article class="py-8 mx-w-screen-md">
        <a href="/posts/">
            <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900 hover:underline">{{ $post['title'] }}</h2>
        </a>
        <div>
            By
            <a href="/authors/{{ $post->author->username }}"
                class="text-base text-gray-500 hover:underline">{{ $post->author->name }}</a>
            <a
                href="/categories/{{ $post->category->slug }}"class="text-base text-gray-500 hover:underline">{{ $post->category->name }}</a>
            /
            {{ $post->created_at->diffForHumans() }}
        </div>
        <p class="my-4 font-light">
            {{ $post['body'] }}
        </p>
        <a href="/posts" class="font-medium text-blue-500 hover:underline">&laquo; Back to posts</a>
    </article> --}}

    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <article
                class="mx-auto w-full max-w-4xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 lg:mb-6 not-format">
                    <a href="/posts" class="inline-flex items-center font-medium text-sm text-blue-600 transition duration-300 ease-in-out transform hover:text-blue-800 hover:scale-105 group">
                        <svg class="w-4 h-4 mr-2 transition-transform duration-300 ease-in-out group-hover:-translate-x-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 111.414 1.414L3.414 10H17a1 1 0 110 2H3.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                        </svg>
                        Back to all posts
                    </a>

                    <address class="flex items-center my-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                            <img class="mr-4 w-16 h-16 rounded-full" src="/img/Screenshot 2024-09-22 232209.png"
                                alt="{{ $post->author->name }}">
                            <div>
                                <a href="/posts?author={{ $post->author->username }}" rel="author"
                                    class="text-xl font-bold text-gray-900 dark:text-white">{{ $post->author->name }}
                                </a>
                                <p class="text-base text-gray-500 dark:text-gray-400 mb-1">
                                    {{ $post->created_at->diffForHumans() }}
                                </p>
                                <a href="/posts?category={{ $post->category->slug }}">
                                    <span
                                        class="bg-{{ $post->category->color }}-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800 transition duration-300 ease-in-out transform hover:bg-{{ $post->category->color }}-200 hover:scale-105">
                                        {{ $post->category->name }}
                                    </span>
                                </a>

                            </div>
                        </div>
                    </address>
                    <h1
                        class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                        {{ $post->title }}</h1>
                </header>
                <p>{{ $post->body }}</p>
            </article>
</x-layout>
