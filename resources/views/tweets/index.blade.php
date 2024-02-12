<!-- resources/views/tweets/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tweet一覧') }}
        </h2>
    </x-slot>

    <!-- コンテンツを表示するエリア -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- 繰り返しここから ↓ -->
                    @foreach ($tweets as $tweet)
                    <!-- 繰り返し対象＝１投稿単位 -->
                    <div class="mb-4 p-4 bg-gray-100 dark:bg-gray-700 rounded-lg">
                        <img
                            src="https://img.olympics.com/images/image/private/t_s_pog_staticContent_hero_xl_2x/f_auto/primary/xaxthrmzslhbhzhwxpkz">
                        </img>

                        <p class="text-gray-800 dark:text-gray-300">{{ $tweet->tweet }}</p>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">投稿者: {{ $tweet->user->name }}</p>
                        <a href="{{ route('tweets.show', $tweet) }}" class="text-blue-500 hover:text-blue-700">詳細を見る</a>
                        {{-- 🔽 追加 --}}
                        <div class="flex">
                            @if ($tweet->liked->contains(auth()->id()))
                            <form action="{{ route('tweets.dislike', $tweet) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">dislike
                                    {{$tweet->liked->count()}}</button>
                            </form>
                            @else
                            <form action="{{ route('tweets.like', $tweet) }}" method="POST">
                                @csrf
                                <button type="submit" class="text-blue-500 hover:text-blue-700">like
                                    {{$tweet->liked->count()}}</button>
                            </form>
                            @endif
                        </div>
                        {{-- 🔼 ここまで --}}
                    </div>
                    @endforeach
                    <!-- 繰り返しここまで ↑ -->
                </div>
            </div>
        </div>
    </div>

</x-app-layout>