<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet" />
	<link rel="stylesheet" href="/assets/main.css">
	<script src="/assets/tailwind.js"></script>
	<link rel="shortcut icon" href="public/images/favicon.svg" type="image/x-icon">

	<title>Личный кабинет</title>
</head>

<body class="bg-gray-100">

	<header class="w-full text-gray-700 bg-white border-t border-gray-100 shadow-sm body-font">
    <div class="container flex flex-col items-start justify-between p-6 mx-auto md:flex-row">
      <a href="/" class="flex items-center mb-4 font-medium text-gray-900 title-font md:mb-0">
        <img class="mx-auto h-8 w-auto pr-2" src="public/images/LogoForest.svg" alt="Вайбул Эко">
        <span class="text-green-700">Эко Вайбул</span>
      </a>
    </div>
	</header>

	<div class="flex flex-col justify-center items-center min-h-screen py-12 px-4 sm:px-6 lg:px-8">
		<div class="w-full max-w-4xl bg-white p-8 shadow-lg rounded-lg">
			<div class="text-center mb-8">
				<h2 class="text-3xl font-extrabold text-gray-900">Личный кабинет</h2>
				<p class="text-gray-600 mt-2">Добро пожаловать в вашу учетную запись</p>
			</div>

			<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
				<div class="bg-gray-50 p-6 rounded-lg shadow">
					<h3 class="text-xl font-bold text-gray-800 mb-4">Ваши данные</h3>
					<p class="text-sm font-medium text-gray-500">Имя: <span class="text-gray-900"><?= $_SESSION['user']['name'] ?></span></p>
					<p class="text-sm font-medium text-gray-500">Фамилия: <span class="text-gray-900"><?= $_SESSION['user']['surname'] ?></span></p>
					<p class="text-sm font-medium text-gray-500">Кол-во баллов: <span class="text-gray-900"><?= $_SESSION['user']['points'] ?></span></p>
					<p class="text-sm font-medium text-gray-500">Роль: 
    				<span class="text-gray-900">
        			<?php 
            		switch ($_SESSION['user']['role']) {
            	    	case 1:
            	        	echo 'Администратор';
            	        	break;
            	    	case 2:
            	        	echo 'Сотрудник Департамента';
            	        	break;
            	    	case 3:
            	        	echo 'Организатор';
            	        	break;
            	    	case 4:
            	        	echo 'Активист';
            	        	break;
            	    	default:
            	        	echo 'Неизвестная роль';
           		 	}
        			?>
    				</span>
        		<?php 
						if ($_SESSION['user']['role'] == 3) {
            	switch ($_SESSION['user']['ul_confirm']) {
                	case NULL:
                    	echo '<span class="text-red-900">(Не подтвержден)</span>';
                    	break;
                	case 1:
                    	echo '<span class="text-green-900">(Подтвержден)</span>';
                    	break;
                	default:
                    	echo '<span class="text-gray-900">(Неизвестный статус)</span>';
           	 	}
						}
        		?>
					</p>
					<?php
							if ($_SESSION['user']['ul_confirm'] == NULL && $_SESSION['user']['role'] == 3) {
								echo '
									<a href="/ul-confirm" class="mt-3 inline-flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-600">Подтвердить роль организатора</a>
								';
							}
					?>
				</div>
				<div class="flex justify-center items-center">
					<img class="h-24 w-24 rounded-full shadow" src="public/images/LogoForest.svg" alt="Логотип">
				</div>
			</div>
			
			<?php
				if($_SESSION['user']['role'] == 3):
			?>
			<div class="bg-white p-6 rounded-lg shadow mb-10">
				<a href="/events" class="mt-5 w-full inline-flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-600">Мероприятия</a>
			</div>
			<?php endif; ?>

			<?php
				if($_SESSION['user']['role'] == 4):
			?>
			<div class="bg-white p-6 mb-10 rounded-lg shadow">
				<span class="font-bold text-gray-500">Выбранные мероприятия</span>
				<?php
					foreach ($current_events as $ce):
				?>
				<div class="pt-5">
					<a href="https://вайбул-эко.рф/card-detail/<?= $ce['event_id'] ?>">
							<h1 class="text-xl font-semibold"><?= $ce['event_title'] ?> (+<?= $ce['event_points']?> баллов)</h1>
							<?php
						$dateString = $ce['event_date'];
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
				?>
							<span class="text-blue-500 text-lg font-semibold">📅 <?= $formattedDate ?></span>
					</a>
				</div>
				<? endforeach; ?>
			</div>
			<?php endif; ?>

			<div class="bg-white p-6 rounded-lg shadow">
				<h3 class="text-2xl font-semibold leading-6 text-gray-900 mb-6">Редактирование данных</h3>
				<form class="space-y-6" action="/update-profile" method="POST">
					<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
						<div>
							<label for="surname" class="block text-sm font-medium text-gray-700">Фамилия</label>
							<input id="surname" name="surname" type="text" value="<?= $_SESSION['user']['surname'] ?>" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-green-600 focus:border-green-600 sm:text-sm">
						</div>
						<div>
							<label for="name" class="block text-sm font-medium text-gray-700">Имя</label>
							<input id="name" name="name" type="text" value="<?= $_SESSION['user']['name'] ?>" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-green-600 focus:border-green-600 sm:text-sm">
						</div>
						<div>
							<label for="patronymic" class="block text-sm font-medium text-gray-700">Отчество</label>
							<input id="patronymic" name="patronymic" type="text" value="<?= $_SESSION['user']['patronymic'] ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-green-600 focus:border-green-600 sm:text-sm">
						</div>
						<div>
							<label for="phone" class="block text-sm font-medium text-gray-700">Телефон</label>
							<input id="phone" name="phone" type="tel" value="<?= $_SESSION['user']['phone'] ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-green-600 focus:border-green-600 sm:text-sm">
						</div>
						<div class="md:col-span-2">
							<label for="email" class="block text-sm font-medium text-gray-700">Почта</label>
							<input id="email" name="email" type="email" value="<?= $_SESSION['user']['email'] ?>" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-green-600 focus:border-green-600 sm:text-sm">
						</div>
					</div>
					<div class="mt-6">
						<button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-600">
							Сохранить изменения
						</button>
					</div>
				</form>
				<a href="/sign-out" class="mt-5 w-full inline-flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-600">Выйти</a>
			</div>
		</div>
	</div>
</body>

</html>