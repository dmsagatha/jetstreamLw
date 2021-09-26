@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'peer h-10 border-b-2 border-gray-300 text-gray-900 placeholder-transparent focus:outline-none focus:border-rose-600']) !!} placeholder="Ingresar" />