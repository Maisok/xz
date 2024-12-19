<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Чат</title>
    <link rel="shortcut icon" href="{{asset('images/Group 438.png')}}" type="image/x-icon">
</head>


@include('components.header-seller')

<div class="w-full">
    <div class="flex flex-col md:flex-row">
        <!-- Боковая панель для списка чатов на больших экранах -->
        <div class="chat-list-container w-1/4  md:block hidden">
            @include('components.chat-list', ['userChats' => $userChats])
        </div>

        <!-- Содержимое страницы -->
        <div class="w-full  md:block hidden border-l pl-4 border-gray-300">
            <h2 class="text-2xl font-bold mb-4">Выберите чат</h2>
            <p class="text-gray-600">Пожалуйста, выберите чат из списка слева, чтобы начать общение.</p>
        </div>
    </div>

    <!-- Мобильный список чатов -->
    <div class="chat-list-mobile md:hidden">
        @include('components.chat-list-mobile', ['userChats' => $userChats])
    </div>
</div>
<body>
</body>
</html>