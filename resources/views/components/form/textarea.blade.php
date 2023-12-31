@props(['name'])


<x-form.field>
    <x-form.label :name="$name" />

    <textarea
        class="block p-2.5 w-full border border-gray-300 rounded text-sm text-gray-900 rounded-lg  focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        name="{{ $name }}"
        id="{{ $name }}"
        cols="30"
        rows="3">{{ $slot }}</textarea>


    <x-form.error :name="$name" />
</x-form.field>
