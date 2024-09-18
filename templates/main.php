<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet" />
	<link rel="stylesheet" href="/assets/css/main.css">
	<script src="/assets/tailwind.js"></script>
	<link rel="shortcut icon" href="public/images/favicon.svg" type="image/x-icon">

	<title>Главная страница</title>
    <script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
    <script src="assets/map.js" type="text/javascript"></script>
</head>
<body>

<!-- Шапка сайта (хедер) -->
<header class="w-full text-gray-700 bg-white border-t border-gray-100 shadow-sm body-font">
        <div class="container flex flex-col items-start justify-between p-6 mx-auto md:flex-row">
            <a href="/" class="flex items-center mb-4 font-medium text-gray-900 title-font md:mb-0">
            <img class="mx-auto h-8 w-auto pr-2" src="public/images/LogoForest.svg" alt="Вайбул Эко">
            <span class="text-green-700">Эко Вайбул</span>
            </a>
            <nav class="flex flex-wrap items-center justify-center text-base">
                <a href="/" class="mr-5 font-medium hover:text-gray-900">Главная страница</a>
                <a href="#projects" class="mr-5 font-medium hover:text-gray-900">Актуальные мероприятия</a>
                <a href="#map" class="font-medium hover:text-gray-900">Карта</a>
            </nav>
            <?php
                if(!isset($_SESSION['user'])) {
                    echo '
                    <div class="items-center h-full">
                        <a href="/reg" class="mr-5 font-medium hover:text-gray-900">Регистрация</a>
                        <a href="/auth"
                            class="px-4 py-2 text-xs font-bold text-white uppercase transition-all duration-150 bg-green-700 rounded shadow outline-none active:bg-teal-600 hover:shadow-md focus:outline-none ease">
                            Войти
                        </a>
                    </div>';
                } else {
                    echo '
                    <a href="/profile"
                        class="px-4 py-2 text-xs font-bold text-white uppercase transition-all duration-150 bg-green-700 rounded shadow outline-none active:bg-teal-600 hover:shadow-md focus:outline-none ease">
                        Профиль
                    </a>
                    ';
                }
            ?>
        </div>
</header>

<!-- Секция "Добро пожаловать" -->
<section class="relative bg-cover bg-center h-screen" style="background-image: url('public/images/banner-wow.jpg');">
    <div class="absolute inset-0 bg-black opacity-50"></div> <!-- Затемнение фона -->
    <div class="container relative z-10 flex flex-col items-center justify-center h-full px-6 mx-auto text-center text-white">
        <h1 class="text-4xl font-bold sm:text-5xl md:text-6xl">
            Добро пожаловать в <span class="font-bold text-green-400">Эко Вайбул</span>
        </h1>
        <p class="mt-4 text-lg sm:text-xl md:text-2xl">
            Лучшее место для <u>экоактивистов</u> Москвы
        </p>
        <a href="#"
            class="mt-8 px-8 py-3 text-lg font-bold text-white bg-green-700 rounded shadow-md hover:bg-green-600 transition duration-150 ease-in-out">
            Узнать больше
        </a>
    </div>
</section>

 <!-- Секция "Популярные эко-проекты" -->
<section class="bg-gray-100 py-12" id="projects">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold text-gray-800 mb-14">Популярные эко-проекты</h2>
        <div class="grid gap-8 md:grid-cols-3">

            <?php
                foreach($cards as $card):
            ?>
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img class="w-full h-[350px] object-cover" src="public/images/<?= $card['event_img'] ?>" alt="Проект 1">
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800"><?= $card['event_title'] ?></h3>
                    <p class="mt-2 text-gray-600"><?= $card['event_description'] ?></p>
                    <?php
                        $dateString = $card['event_date'];
                        $date = new DateTime($dateString);
                        $formattedDate = $date->format('j F, Y');
                        $months = [
                            'January' => 'января',
                            'February' => 'февраля',
                            'March' => 'марта',
                            'April' => 'апреля',
                            'May' => 'мая',
                            'June' => 'июня',
                            'July' => 'июля',
                            'August' => 'августа',
                            'September' => 'сентября',
                            'October' => 'октября',
                            'November' => 'ноября',
                            'December' => 'декабря'
                        ];
                        $formattedDate = str_replace(array_keys($months), array_values($months), $formattedDate);
                        echo '<p class="mt-2 text-gray-500 text-sm">Дата: ' . $formattedDate . '</p>';
                    ?>
                    <a href="/card-detail/<?= $card['event_id'] ?>"
                        class="inline-block mt-4 px-4 py-2 text-white bg-green-700 hover:bg-green-600 rounded-md font-semibold transition duration-150 ease-in-out">
                        Перейти на событие
                    </a>
                </div>
            </div>
            <?php
                endforeach;
            ?>
        </div>
    </div>
</section>

<!-- Секция "Карта с эко-проектами" -->
<section class="bg-gray-100 flex flex-col items-center juctify-center mb-10">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold text-gray-800 mb-14">Не нашли ничего интересного для себя?<br>Проверьте нашу карту с эко-проектами, вы обязательно что-нибудь для себя найдете!</h2>
    </div>
    <div id="map"></div>
</section>

<!-- Подвал сайта (футер) -->
<footer class="bg-gray-800 text-white py-8">
    <div class="container mx-auto px-6 flex flex-col md:flex-row items-center justify-between">
        <div class="flex flex-col items-center md:items-start mb-8 md:mb-0">
            <a href="/" class="flex items-center mb-4 font-medium text-gray-900">
                <img class="h-8 w-auto pr-2" src="public/images/LogoForest.svg" alt="Вайбул Эко">
                <span class="text-green-400">Эко Вайбул</span>
            </a>
            <p class="text-gray-400 text-sm text-center md:text-left">
                &copy; 2024 Эко Вайбул. Все права защищены.
            </p>
        </div>
        
        <div class="flex flex-col items-center md:items-end mb-8 md:mb-0">
            <nav class="flex flex-col items-center md:items-end space-y-2">
                <a href="/" class="text-gray-400 hover:text-white">Главная страница</a>
                <a href="#projects" class="text-gray-400 hover:text-white">Актуальные мероприятия</a>
                <a href="#map" class="text-gray-400 hover:text-white">Карта</a>
                <a href="/contact" class="text-gray-400 hover:text-white">Контакты</a>
            </nav>
        </div>
</footer>

</body>
</html>