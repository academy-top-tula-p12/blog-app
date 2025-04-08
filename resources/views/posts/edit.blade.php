<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Edit Post ') }} {{ $post->title }} {{ __(" by ") }} {{ $user->name }}
            </h2>
            <a href="{{ route("posts.index") }}">
                <x-primary-button>{{ __("Back To List Posts") }}</x-primary-button>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 px-6 mb-4 shadow-sm sm:rounded-lg p-4">
                <form action="{{ route("posts.update", [ "post" => $post->id ]) }}"
                      method="POST"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field("PUT") }}

                    <div class="mb-4">
                        <x-input-label>{{ __("Published on front") }}</x-input-label>
                        <input type="checkbox" id="is_published" name="is_published" @checked($post->is_published)>
                        <br>
                    </div>

                    <x-input-label>{{ __("Title") }}</x-input-label>
                    <x-text-input id="title" name="title" type="text" class="mt-2 mb-4 w-full" required value="{{ $post->title }}" />
                    <br>

                    <x-input-label>{{ __("Content") }}</x-input-label>
                    <textarea id="content" name="content" rows="10" cols="130" class="mt-2 mb-4 w-full">
                        {{ $post->content }}
                    </textarea>
                    <br>

                    <x-input-label>{{ __("Cover picture") }}</x-input-label>
                    <img src="{{ Illuminate\Support\Facades\Storage::url($post->cover) }}" height="100" alt="Cover picture">
                    <x-text-input id="cover" name="cover" type="file" class="mt-2 block w-full" />
                    <br>

                    <x-input-label>{{ __("Category") }}</x-input-label>
                    <select id="category" name="category" class="mt-2 mb-4 w-full">
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                                @selected($post->category->id == $category->id)>
                                {{ $category->title }}
                        </option>
                        @endforeach
                    </select>
                    <br>

                    <x-input-label>{{ __("Tags") }}</x-input-label>
                    <select id="tags" name="tags[]" multiple class="mt-2 mb-4 w-full">
                        @foreach($tags as $tag)
                        <option value="{{ $tag->id }}"
                                @selected($post->tags->contains($tag))>
                            {{ $tag->title }}
                        </option>
                        @endforeach
                    </select>
                    <br>

                    <x-primary-button>{{ __("Save") }}</x-primary-button>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
