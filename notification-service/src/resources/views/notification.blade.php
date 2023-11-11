<x-app-layout>
    @auth
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Notifications') }}
            </h2>
        </x-slot>

        <div class="py-12">
            @foreach ($notifications as $notification)
                <div class="p-4">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900 dark:text-gray-100">
                                {{ $notification->content }}
                            </div>
                            <div class="p-6">
                                <form action="{{ route('notifications-markasread', ['notification' => $notification]) }}" method="POST">
                                    @csrf
                                    <x-primary-button>
                                        Mark As Read
                                    </x-primary-button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endauth
</x-app-layout>
