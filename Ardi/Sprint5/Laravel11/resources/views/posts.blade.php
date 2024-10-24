<x-layout>
    <x-slot:title>{{ $title }}</x-slot>

    <h1 class="font-bold text-3xl orange-950"></h1>
    <br>
    
    <div class="py-4 px-4 mx-auto max-w-screen-xl lg:py-8 lg:px-0">
        <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">
            <h2 class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Featured</h2>
        </div>
        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3"> 
            @foreach ($posts as $post)
                    {{-- <article class="py-8 max-w-screen-md" border-b border-gray-300>
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
                    </article>--}}
                    <article class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex justify-between items-center mb-5 text-gray-500">
                            <span class="bg-green-400 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                {{ $post->category->name }}
                            </span>
                            <span class="text-sm">14 days ago</span>
                        </div>
                        <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><a href="#">How to quickly deploy a static website</a></h2>
                        <p class="mb-5 font-light text-gray-500 dark:text-gray-400">Static websites are now used to bootstrap lots of websites and are becoming the basis for a variety of tools that even influence both web designers and developers influence both web designers and developers.</p>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center space-x-4">
                                <img class="w-7 h-7 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png" alt="Jese Leos avatar" />
                                <span class="font-medium dark:text-white">
                                    Jese Leos
                                </span>
                            </div>
                            <a href="#" class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline">
                                Read more
                                <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </a>
                        </div>
                    </article>                   
            @endforeach
        </div>  
    </div>
</x-layout>

