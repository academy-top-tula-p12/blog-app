<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Tag') }} {{ $tag->title }}
            </h2>
            <a href="{{ route("tags.index") }}">
                <x-primary-button>{{ __("Back To List Tags") }}</x-primary-button>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($posts as $post)
            @if($post)
            <div class="bg-white dark:bg-gray-800 px-6 mb-4 shadow-sm sm:rounded-lg p-4">
                <div class="text-gray-900 dark:text-gray-100">
                    <a href="{{ route("posts.show", ["post" => $post->id]) }}">
                        {{ $post->title }}
                    </a>
                </div>
                <div class="space-x-2 flex">
                    <a href="{{ route("posts.edit", ["post" => $post->id]) }}">
                        <x-primary-button>{{ __("Edit") }}</x-primary-button>
                    </a>
                    <a href="{{ route("posts.destroy", ["post" => $post->id]) }}">
                        <x-primary-button>{{ __("Delete") }}</x-primary-button>
                    </a>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>

</x-app-layout>
