<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('store-post') }} " method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="p-4">

                        <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Post
                            Something:</label>
                    </div>
                    <div class="p-4">

                        <textarea id="content" rows="4" name="content"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Write your thoughts here...">
                    </textarea>
                    </div>

                    <input type="file" name="images[]" id="images" multiple>
                    <x-primary-button class="ml-4 mb-4">
                        Post
                    </x-primary-button>
                </form>
            </div>
        </div>
    </div>


    @foreach ($posts as $post)
        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <x-post-card :photos="$post->photos">
                            <x-slot name="content"> {{ $post->content }} </x-slot>
                            {{-- <x-slot name="photos"> {{$post->photos}} </x-slot> --}}
                            <x-slot name="name"> {{ $post->user->name }} </x-slot>
                            <x-slot name="created_at"> {{ $post->created_at }} </x-slot>
                        </x-post-card>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</x-app-layout>
