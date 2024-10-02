<x-layout>
    <x-slot:title>{{ $title }}</x-slot>

    <article class="py-8 mx-w-screen-md">
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
    </article>


</x-layout>
