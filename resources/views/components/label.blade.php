@props(['value'])

<label {{ $attributes->merge(['class' => 'absolute left-0 -top-3.5 text-gray-600 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm']) }}>
  {{ $value ?? $slot }}
</label>