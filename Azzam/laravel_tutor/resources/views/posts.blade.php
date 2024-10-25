<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <h2>Welcome to My Blog</h2>
    @foreach ($posts as $post )
        
    <article class="py-7 max-w-screen-md border-b border-gray-400">
        <a href="/posts/{{ $post['slug'] }}" class="hover:underline">
        <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">{{ $post['title'] }}</h2>
    </a>
        <div class="text-base text-gray-500">
            <a href="/authors/{{ $post->author->id }}" class="hover:underline">{{ $post->author->name }}</a> | {{ $post->created_at->format('j F Y') }}
        </div>
        <p class="my-4 font-light">{{ Str::limit($post['body'], 150 )}}</p>
        <a href="/posts/{{ $post['slug'] }}" class="font-medium text-blue-500 hover:underline">Read more &raquo;</a>
    </article>

    @endforeach

</x-layout>