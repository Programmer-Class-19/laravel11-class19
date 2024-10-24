<x-layout>
<x-slot:title>{{ $title }}</x-slot:title>
 

    <article class="py-8 max-w-screen-md ">
        
     <h2 class="mb-3 text-3xl tracking-tight font-bold text-gray-900">{{ $post ['title'] }}</h2>
     
     <div class="text-base text-gray-500">
        <a href="#">{{ $post ['author'] }}</a> | 1 Oktober 2004

     </div>

     <p class="my-4 font-light">{{ ( $post ['body'] ) }}</p>

     <img src="public/img/download.jpeg" alt="">

     <a href="/posts" class="font-medium text-blue-500 hover:underline"> &laquo; Back To Posts  </a>
    
    </article> 

</x-layout> 
