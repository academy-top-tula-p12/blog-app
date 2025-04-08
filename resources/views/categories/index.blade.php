<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Categories List') }}
            </h2>
            <a href="{{ route("categories.create") }}">
                <x-primary-button>{{ __("Create New Category") }}</x-primary-button>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($categories as $category)
            <div class="bg-white dark:bg-gray-800 px-6 mb-4 h-20 overflow-hidden shadow-sm sm:rounded-lg flex justify-between items-center">
                <div class="text-gray-900 dark:text-gray-100">
                    <a href="{{ route("categories.show", ["category" => $category->id]) }}">
                        {{ $category->title }}
                    </a>
                </div>
                <div class="space-x-2 flex">
                    <a href="{{ route("categories.edit", ["category" => $category->id]) }}">
                        <x-primary-button>{{ __("Edit") }}</x-primary-button>
                    </a>
                    <form action="{{ route("categories.destroy", ["category" => $category->id]) }}"
                        method="POST"
                        class="inline ml-4">
                        {{ csrf_field() }}
                        {{ method_field("DELETE") }}
                        <x-danger-button>{{ __("Delete") }}</x-danger-button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</x-app-layout>
