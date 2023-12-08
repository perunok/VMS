@props(['text'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700 dark:text-gray-300 mx-4']) }}>
    {{$text}}
</label>
