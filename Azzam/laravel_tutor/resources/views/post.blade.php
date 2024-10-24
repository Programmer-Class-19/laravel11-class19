<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <h2>Welcome to My Blog</h2>
        
    <article class="py-7 max-w-screen-md">        
        <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">{{ $post['title'] }}</h2>
        <div class="text-base text-gray-500">
            <a href="#">{{ $post['author'] }}</a> | {{ $post->created_at->format('j F Y') }}
        </div>
        <p class="my-4 font-light">{{ $post['body'] }}</p>
        <a href="/posts" class="font-medium text-blue-500 hover:underline">&laquo; Back to Post</a>
    </article>


</x-layout>