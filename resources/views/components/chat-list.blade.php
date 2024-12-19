<div class="w-full ">
    <h2 class="text-2xl font-bold w-full mb-4 ml-4">Чаты</h2>
    <div class="space-y-4 w-full">
        @foreach($userChats as $userChat)
            <a href="{{ route('chat.show', ['chat' => $userChat]) }}" class="block">
                <div class="grid grid-cols-3 grid-rows-3 chat-item border-b border-gray-300" data-chat-id="{{ $userChat->id }}">
                    <!-- Первый столбец: Аватар пользователя -->
                    <div class="col-span-1 row-span-3 flex items-center justify-center">
                        <img src="{{ ($userChat->user1_id == auth()->id() ? $userChat->user2->avatar_url : $userChat->user1->avatar_url) ?: asset('images/noava.jpg') }}" alt="Аватар" class="w-12 h-12 rounded-full object-cover">
                    </div>

                    <!-- Второй столбец: Имя пользователя -->
                    <div class="col-span-1 row-span-1 flex items-center">
                        <h3 class="font-semibold text-black">
                            {{ $userChat->user1_id == auth()->id() ? $userChat->user2->username : $userChat->user1->username }}
                        </h3>
                    </div>

                    <!-- Третий столбец: Время -->
                    <div class="col-span-1 row-span-1 mr-4 flex items-center justify-end">
                        @if($userChat->last_message)
                            <span class="text-sm text-gray-500">
                                {{ $userChat->last_message->created_at->format('H:i') }}
                            </span>
                        @endif
                    </div>

                    <!-- Второй столбец: Название товара -->
                    <div class="col-span-1 row-span-1">
                        <p class="text-sm text-black">
                            Название товара по которому диалог
                        </p>
                    </div>

                    <!-- Третий столбец: Счетчик непрочитанных сообщений -->
                    <div class="col-span-1 row-span-1 flex items-center mr-4 justify-end">
                        @if($userChat->unread_count > 0)
                            <span class="bg-blue-500 text-white rounded-full px-2 py-1 text-xs unread-count">{{ $userChat->unread_count }}</span>
                        @else
                            <span class="bg-blue-500 text-white rounded-full px-2 py-1 text-xs unread-count hidden"></span>
                        @endif
                    </div>

                    <!-- Второй столбец: Текст последнего сообщения -->
                    <div class="col-span-1 row-span-1">
                        <p class="text-sm text-gray-400">
                            @if($userChat->last_message)
                                {{ Str::limit($userChat->last_message->message, 20, '...') }}
                            @else
                                Нет сообщений
                            @endif
                        </p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>