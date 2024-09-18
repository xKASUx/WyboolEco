<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet" />
	<link rel="stylesheet" href="/assets/main.css">
	<script src="/assets/tailwind.js"></script>
	<link rel="shortcut icon" href="public/images/favicon.svg" type="image/x-icon">

	<title>Главная страница</title>
</head>
<body>

<!-- Шапка сайта (хедер) -->
<header class="w-full mt-5 text-gray-700 bg-white border-t border-gray-100 shadow-sm body-font">
        <div class="container flex flex-col items-start justify-between p-6 mx-auto md:flex-row">
            <a href="#" class="flex items-center mb-4 font-medium text-gray-900 title-font md:mb-0">
            <img class="mx-auto h-8 w-auto pr-2" src="public/images/LogoForest.svg" alt="Вайбул Эко">
            <span class="text-green-700">Эко Вайбул</span>
            </a>
            <nav class="flex flex-wrap items-center justify-center pl-24 text-base md:ml-auto md:mr-auto">
                <a href="#" class="mr-5 font-medium hover:text-gray-900">Главная страница</a>
                <a href="#" class="mr-5 font-medium hover:text-gray-900">О нас</a>
                <a href="#" class="font-medium hover:text-gray-900">Контакты</a>
            </nav>
            <div class="items-center h-full">
                <a href="#" class="mr-5 font-medium hover:text-gray-900">Регистрация</a>
                <a href="#"
                    class="px-4 py-2 text-xs font-bold text-white uppercase transition-all duration-150 bg-green-700 rounded shadow outline-none active:bg-teal-600 hover:shadow-md focus:outline-none ease">
                    Войти
                </a>
            </div>
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
<section class="relative bg-cover bg-center h-screen">
    <h2 class="text-center text-gray-500 text-5xl mt-20">Самые популярные экопроекты Москвы!</h2>
<div class="flex flex-wrap gap-20 items-start justify-center  mt-[-150px]">
    
    <div class="flex justify-center items-center min-h-screen">
        <div class="max-w-[720px] mx-auto">
           
            <!-- Centering wrapper -->
            <div class="relative flex flex-col text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-140">
                <div class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white bg-clip-border rounded-xl h-96">
                    <img
                        src="https://images.unsplash.com/photo-1629367494173-c78a56567877?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=927&amp;q=80"
                        alt="card-image" class="object-cover w-full h-full" />
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-2">
                        <p class="block font-sans text-base antialiased font-medium leading-relaxed text-blue-gray-900">
                            Apple AirPods
                        </p>
                        <p class="block font-sans text-base antialiased font-medium leading-relaxed text-blue-gray-900">
                            $95.00
                        </p>
                    </div>
                    <p class="block font-sans text-sm antialiased font-normal leading-normal text-gray-700 opacity-75">
                        With plenty of talk and listen time, voice-activated Siri access, and an
                        available wireless charging case.
                    </p>
                </div>
                <div class="p-6 pt-0">
                    <button
                        class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg shadow-gray-900/10 hover:shadow-gray-900/20 focus:opacity-[0.85] active:opacity-[0.85] active:shadow-none block w-full bg-blue-gray-900/10 text-blue-gray-900 shadow-none hover:scale-105 hover:shadow-none focus:scale-105 focus:shadow-none active:scale-100"
                        type="button">
                        Add to Cart
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-center items-center min-h-screen">
        <div class="max-w-[720px] mx-auto">    
            <!-- Centering wrapper -->
            <div class="relative flex flex-col text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-140">
                <div class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white bg-clip-border rounded-xl h-96">
                    <img
                        src="https://images.unsplash.com/photo-1629367494173-c78a56567877?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=927&amp;q=80"
                        alt="card-image" class="object-cover w-full h-full" />
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-2">
                        <p class="block font-sans text-base antialiased font-medium leading-relaxed text-blue-gray-900">
                            Apple AirPods
                        </p>
                        <p class="block font-sans text-base antialiased font-medium leading-relaxed text-blue-gray-900">
                            $95.00
                        </p>
                    </div>
                    <p class="block font-sans text-sm antialiased font-normal leading-normal text-gray-700 opacity-75">
                        With plenty of talk and listen time, voice-activated Siri access, and an
                        available wireless charging case.
                    </p>
                </div>
                <div class="p-6 pt-0">
                    <button
                        class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg shadow-gray-900/10 hover:shadow-gray-900/20 focus:opacity-[0.85] active:opacity-[0.85] active:shadow-none block w-full bg-blue-gray-900/10 text-blue-gray-900 shadow-none hover:scale-105 hover:shadow-none focus:scale-105 focus:shadow-none active:scale-100"
                        type="button">
                        Add to Cart
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-center items-center min-h-screen">
        <div class="max-w-[720px] mx-auto">
    
            <!-- Centering wrapper -->
            <div class="relative flex flex-col text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-140">
                <div class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white bg-clip-border rounded-xl h-96">
                    <img
                        src="https://images.unsplash.com/photo-1629367494173-c78a56567877?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=927&amp;q=80"
                        alt="card-image" class="object-cover w-full h-full" />
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-2">
                        <p class="block font-sans text-base antialiased font-medium leading-relaxed text-blue-gray-900">
                            Apple AirPods
                        </p>
                        <p class="block font-sans text-base antialiased font-medium leading-relaxed text-blue-gray-900">
                            $95.00
                        </p>
                    </div>
                    <p class="block font-sans text-sm antialiased font-normal leading-normal text-gray-700 opacity-75">
                        With plenty of talk and listen time, voice-activated Siri access, and an
                        available wireless charging case.
                    </p>
                </div>
                <div class="p-6 pt-0">
                    <button
                        class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg shadow-gray-900/10 hover:shadow-gray-900/20 focus:opacity-[0.85] active:opacity-[0.85] active:shadow-none block w-full bg-blue-gray-900/10 text-blue-gray-900 shadow-none hover:scale-105 hover:shadow-none focus:scale-105 focus:shadow-none active:scale-100"
                        type="button">
                        Add to Cart
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

</body>
</html>