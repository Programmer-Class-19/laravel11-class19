<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>

  @foreach ($posts as $posts )
    
  <article class="py-8 max-w-screen-md border-b border-gray-300">
    <a href="/posts/{{ $posts['slug'] }}" class="hover:underline">
      <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">{{ $posts['title'] }}</h2>

      <div class="text-base text-gray-500 ">
        <a href="/authors/{{ $posts->author->id }}" class="hover:underline">{{ $posts->author->name }}</a>| {{ $posts->created_at->diffForHumans() }}
      </div>

      <p class="my-4 font-light">
        {{ Str::limit($posts['body'], 150) }}
      </p>

      <a href="/posts/{{ $posts['slug'] }}" class="font-medium text-blue-500">Read more &raquo;</a>
    </a> 
  </article>
  @endforeach

</x-layout>