<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet" />
	<link rel="stylesheet" href="/assets/css/main.css">
	<script src="/assets/tailwind.js"></script>
	<link rel="shortcut icon" href="public/images/favicon.svg" type="image/x-icon">
	<title>Эко-маркет</title>
	<style>
		.btn:hover {
			background-color: #38a169;
			transform: scale(1.05);
			transition: all 0.3s ease;
		}
	</style>
</head>

<body class="bg-gray-100">
	<header class="w-full text-gray-700 bg-white border-t border-gray-100 shadow-sm body-font">
		<div class="container flex items-center justify-between p-6 mx-auto">
			<a href="/" class="flex items-center">
				<img class="h-8 w-auto pr-2" src="/public/images/LogoForest.svg" alt="Вайбул Эко">
				<span class="text-green-700">Эко Вайбул</span>
			</a>
			<div>
				<a href="/my-profile" class="text-green-700 font-semibold">Мои экобаллы: <span id="eco-points"><?= $_SESSION['user']['points'] ?></span></a>
			</div>
		</div>
	</header>

	<div class="container mx-auto mt-10">
		<h1 class="text-3xl font-bold text-gray-800 mb-6">Обмен экобаллов на продукцию от спонсоров</h1>
		<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
			<div class="bg-white rounded-lg shadow-lg overflow-hidden">
				<img class="w-full h-80 object-cover" src="/public/images/product-1.jpg" alt="Эко-сумка">
				<div class="p-6">
					<h2 class="text-xl font-bold text-gray-800">Эко-сумка</h2>
					<p class="text-gray-600 mt-2">Стильная сумка из переработанных материалов.</p>
					<p class="text-green-600 mt-4 font-semibold">Цена: 50 экобаллов</p>
					<button class="btn mt-4 w-full bg-green-500 text-white font-bold py-2 px-4 rounded-full">Обменять</button>
				</div>
			</div>
			<div class="bg-white rounded-lg shadow-lg overflow-hidden">
				<img class="w-full h-80 object-cover" src="/public/images/product-2.jpg" alt="Многоразовая бутылка">
				<div class="p-6">
					<h2 class="text-xl font-bold text-gray-800">Многоразовая бутылка</h2>
					<p class="text-gray-600 mt-2">Экологичная бутылка для воды, чтобы сократить использование пластика.</p>
					<p class="text-green-600 mt-4 font-semibold">Цена: 100 экобаллов</p>
					<button class="btn mt-4 w-full bg-green-500 text-white font-bold py-2 px-4 rounded-full">Обменять</button>
				</div>
			</div>
			<div class="bg-white rounded-lg shadow-lg overflow-hidden">
				<img class="w-full h-80 object-cover" src="/public/images/product-3.jpg" alt="Набор бамбуковых столовых приборов">
				<div class="p-6">
					<h2 class="text-xl font-bold text-gray-800">Набор бамбуковых столовых приборов</h2>
					<p class="text-gray-600 mt-2">Компактный и экологичный набор из бамбука.</p>
					<p class="text-green-600 mt-4 font-semibold">Цена: 70 экобаллов</p>
					<button class="btn mt-4 w-full bg-green-500 text-white font-bold py-2 px-4 rounded-full">Обменять</button>
				</div>
			</div>
		</div>

		<div class="sponsor-block mb-10">
			<h1 class="text-3xl font-bold text-gray-800 mt-6 flex justify-center mb-2">Наши спонсоры</h1>
			<div class="max-w-2xl mx-auto">

    <div id="default-carousel" class="relative rounded-lg overflow-hidden shadow-lg" data-carousel="static">
        <div class="relative h-80 md:h-96" data-carousel-inner>
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="/public/images/sber.jpg"
                    class="object-cover w-full h-86" alt="Slide 1">
            </div>
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="/public/images/gos-uslugi.jpg"
                    class="object-cover w-full h-full" alt="Slide 2">
            </div>
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="/public/images/altai.png"
                    class="object-cover w-full h-[360px]" alt="Slide 3">
            </div>
        </div>
        <div class="flex absolute bottom-5 left-1/2 z-30 -translate-x-1/2 space-x-2" data-carousel-indicators>
            <button type="button" class="w-3 h-3 rounded-full bg-gray-300 hover:bg-gray-400 focus:outline-none focus:bg-gray-400 transition"></button>
            <button type="button" class="w-3 h-3 rounded-full bg-gray-300 hover:bg-gray-400 focus:outline-none focus:bg-gray-400 transition"></button>
            <button type="button" class="w-3 h-3 rounded-full bg-gray-300 hover:bg-gray-400 focus:outline-none focus:bg-gray-400 transition"></button>
        </div>
        <button type="button"
            class="flex absolute top-1/2 left-3 z-40 items-center justify-center w-10 h-10 bg-gray-200/50 rounded-full hover:bg-gray-300 focus:outline-none transition"
            data-carousel-prev>
            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </button>
        <button type="button"
            class="flex absolute top-1/2 right-3 z-40 items-center justify-center w-10 h-10 bg-gray-200/50 rounded-full hover:bg-gray-300 focus:outline-none transition"
            data-carousel-next>
            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>
    </div>

   

</div>

		</div>
	</div>

	<script>
		const buttons = document.querySelectorAll('.btn');
		const ecoPoints = document.getElementById('eco-points');
		let userEcoPoints = parseInt(ecoPoints.textContent);

		buttons.forEach(button => {
			button.addEventListener('click', function () {
				const price = parseInt(this.previousElementSibling.textContent.match(/\d+/)[0]);
				if (userEcoPoints >= price) {
					userEcoPoints -= price;
					ecoPoints.textContent = userEcoPoints;
					alert('Успешный обмен!');
				} else {
					alert('Недостаточно экобаллов для обмена!');
				}
			});
		});
	</script>
	 <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
</body>

</html>
