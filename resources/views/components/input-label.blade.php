@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-green-950']) }}>
    {{ $value ?? $slot }}
</label>
