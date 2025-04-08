<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-4 flex justify-between items-center">
                <div class="p-6 text-gray-900">
                    {{ __("Categories") }}
                </div>
                <a href="{{ route("categories.index") }}">
                    <x-primary-button>{{ __("View") }}</x-primary-button>
                </a>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-4 flex justify-between items-center">
                <div class="p-6 text-gray-900">
                    {{ __("Tags") }}
                </div>
                <a href="{{ route("tags.index") }}">
                    <x-primary-button>{{ __("View") }}</x-primary-button>
                </a>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-4 flex justify-between items-center">
                <div class="p-6 text-gray-900">
                    {{ __("Posts") }}
                </div>
                <a href="{{ route("posts.index") }}">
                    <x-primary-button>{{ __("View") }}</x-primary-button>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
