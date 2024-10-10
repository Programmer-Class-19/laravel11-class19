<x-layout>
    <x-slot:titles>{{ $titles }}</x-slot:titles>
    <x-slot:title>{{ $title }}</x-slot:title>

    <article class="py-8 max-w-screen-md">
        <h2 class="mb-1 text-3xl -tracking-tight font-bold text-gray-900 hover:underline">
            {{ $post['title'] }}
        </h2>
        <div class="text-base text-gray-500">
            <a href="">{{ $post['author'] }}</a> | 1 january 2024
        </div>
        <p class="my-4 font-light">{{ $post['body'] }}</p>
        <a href="/posts" class="font-medium text-blue-500 hover:underline">&laquo; Back to posts</a>
    </article>
</x-layout>
