@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-serif text-sm text-white']) }}>
    {{ $value ?? $slot }}
</label>
