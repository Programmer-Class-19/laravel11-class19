<x-layout>
    <x-slot:title>{{ $title }}</x-slot>

    <h1 class="font-bold text-3xl orange-950">Minecraft, permainan blok yang membuat ketagihan</h1>
    <br>
    @foreach ($posts as $post)
        <article class="py-8 max-w-screen-md" border-b border-gray-300>
            <a href="/posts/{{ $post['slug'] }}" class="hover:underline">
                <h3 class="mb-1 text-3xl tracking-tight font-bold text-gray-500">{{ $post ['title'] }}</h3>
            </a>
            <div>
                by
                <a href="/authors/{{ $post->author->username }}" 
                class="hover:underline">{{ $post->author->name }}</a>
                in
                <a href="/categories/{{ $post->category->slug }}" class="hover:underline text-base text-emerald-600">{{ $post->category->name }}</a>
                | &#169; {{ $post->created_at->diffForHumans() }}
            </div>
            <br>
            <p class="my 4 font-light">{{ Str::limit($post['body'], 100) }}</p>
            <a href='/posts/{{ $post['slug'] }}' class="font-medium text-blue-500 hover:underline">Baca Yang Benar &raquo;</a>
        </article>       
    @endforeach
</x-layout>

