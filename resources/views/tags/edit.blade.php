<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Edit Tag') }} {{ $tag->title }}
            </h2>
            <a href="{{ route("tags.index") }}">
                <x-primary-button>{{ __("Back To List Tags") }}</x-primary-button>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 px-6 mb-4 shadow-sm sm:rounded-lg p-4">
                <form action="{{ route("tags.update", [ "tag" => $tag->id ]) }}"
                      method="POST">
                    {{ csrf_field() }}
                    {{ method_field("PUT") }}

                    <x-input-label>{{ __("Title") }}</x-input-label>
                    <x-text-input id="title" name="title" type="text" class="mt-2 mb-4 w-full" value="{{ $tag->title }}" required />
                    <br>

                    <x-primary-button>{{ __("Save") }}</x-primary-button>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
