<x-layout>
    <x-slot:title>{{ $title }}</x-slot>

        <article class="py-8 mx-w-screen-md">
                <a href="/posts/"><h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900 hover:underline">{{ $post['title'] }}</h2></a>
            <div class="text-base text-gray-500">
                <a href="">{{ $post->author->name }}</a> / {{ $post->created_at->diffForHumans() }}
            </div>
            <p class="my-4 font-light">
                {{ $post['body'] }}
            </p>
            <a href="/posts" class="font-medium text-blue-500 hover:underline">&laquo; Back to posts</a>
        </article>


</x-layout>
