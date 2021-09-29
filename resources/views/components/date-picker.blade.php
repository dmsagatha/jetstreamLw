@props(['value', 'disabled' => false])

<label {{ $attributes->merge(['class' => 'absolute left-0 -top-3.5 text-gray-600 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm']) }}>
  <i class="fas fa-calendar mr-1"></i>
  {{ $value ?? $slot }}
</label>

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'peer h-10 border-b-2 border-gray-300 text-gray-900 placeholder-transparent focus:outline-none focus:border-rose-600']) !!} placeholder="Ingresar" />