@props(['active' => false])
<a {{ $attributes }}
    class="{{ $active ? 'bg-zinc-800 text-white' : 'text-gray-300 hover:bg-zinc-700 hover:text-white' }} rounded-md px-3 py-2 text-white text-sm font-medium"
    aria-current="{{ $active ? 'page' : false }}">{{ $slot }}</a>
