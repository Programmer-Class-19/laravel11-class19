@props(['active' => false])

<a {{ $attributes }}
    class="{{ $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-5 py-3 text-white text-sm font-medium"
    aria-current="{{ $active ? 'page' : false }}">{{ $slot }}</a>
