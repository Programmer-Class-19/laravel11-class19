<x-layout>
    <x-slot:title>{{ $title }}</x-slot>


    <body class="bg-gray-100">

        <div class="p-12 bg-white rounded-lg shadow-md">
            <div class="max-w-xl mx-auto text-center">
                <h1 class="text-5xl font-extrabold text-gray-900 mb-4">Welcome to My Web</h1>
                <p class="text-lg text-gray-600 mb-6">Go to posts!</p>
                <a href="/posts" class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5">Get started</a>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>

</x-layout>
