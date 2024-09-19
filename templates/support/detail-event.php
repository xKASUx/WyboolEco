<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet" />
	<link rel="stylesheet" href="/assets/css/main.css">
	<script src="/assets/tailwind.js"></script>
	<link rel="shortcut icon" href="public/images/favicon.svg" type="image/x-icon">

	<title>Информация о событии</title>
    <script src="assets/map.js" type="text/javascript"></script>
		<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
</head>
<style>
    /* Анимация для кнопки */
    .btn:hover {
      background-color: #5a67d8;
      transform: scale(1.05);
      transition: all 0.3s ease;
    }

		.gradient-bg {
      background: linear-gradient(135deg, #4aab7a 0%, #a2d9a2 50%, #2d6a4f 100%);
    }
		#map {
            width: 100%;
            height: 400px;
        }
</style>
<body class="gradient-bg bg-gray-100 h-full">
<header class="w-full text-gray-700 bg-white border-t border-gray-100 shadow-sm body-font">
    <div class="container flex flex-col items-start justify-between p-6 mx-auto md:flex-row">
      <a href="/" class="flex items-center mb-4 font-medium text-gray-900 title-font md:mb-0">
        <img class="mx-auto h-8 w-auto pr-2" src="/public/images/LogoForest.svg" alt="Вайбул Эко">
        <span class="text-green-700">Эко Вайбул</span>
      </a>
    </div>
	</header>

  <div class="max-w-4xl mx-auto mt-10 bg-white shadow-lg rounded-lg overflow-hidden">
    <img class="w-full h-64 object-cover" src="/public/images/<?= $event['event_img'] ?>" alt="Картинка мероприятия">
    <div class="p-6">
      <h1 class="text-4xl font-bold text-gray-800 mb-4"><?= $event['event_title'] ?></h1>
      <p class="text-gray-600 text-lg leading-relaxed mb-6">
				<?= $event['event_description'] ?>
      </p>
			<span class="text-blue-500 text-lg font-semibold">Баллов выдается по окончании мероприятия: <?= $event['event_points'] ?></span><br><br>
      <div class="flex justify-between items-center mb-6">
			<?php
          $dateString = $event['event_date'];
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
      </div>
			<span class="text-gray-500 text-xl font-semibold">Место проведения</span><br><br>
			<div id="map" class="mt-5"></div>
			<?php
    if (isset($_SESSION['user']) && isset($_SESSION['user']['role'])) {
        if ($_SESSION['user']['role'] == 4) {
            $currentDate = new DateTime();
						$eventDate = new DateTime($dateString);
            if ($currentDate->format('Y-m-d') <= $eventDate->format('Y-m-d')) {
                ?>
                <a href="/events/part/<?= $event['event_id'] ?>" class="mt-10 flex justify-center items-center btn inline-block px-8 py-3 bg-indigo-600 text-white text-lg font-semibold rounded-full shadow-md hover:bg-indigo-500 transition">
                    Участвовать
                </a>
                <?php
            } else {
							?>
							<span class="mt-10 flex justify-center items-center btn inline-block px-8 py-3 bg-red-600 text-white text-lg font-semibold rounded-full shadow-md hover:bg-red-500 transition">
                    Мероприятие проведено
							</span>
							<?php
						}
        }
    }
    ?>
		<div class="mt-10">
    <div class="rating">
        <h2 class="text-2xl font-semibold text-gray-800">Оцените мероприятие:</h2>
        <div class="flex space-x-2 mt-4">
            <span class="star" data-value="1">⭐</span>
            <span class="star" data-value="2">⭐</span>
            <span class="star" data-value="3">⭐</span>
            <span class="star" data-value="4">⭐</span>
            <span class="star" data-value="5">⭐</span>
        </div>
        <p class="text-gray-600 text-sm mt-2">Средний рейтинг: 4.5/5 (20 голосов)</p>
    </div>

    <div class="comments mt-10">
        <h2 class="text-2xl font-semibold text-gray-800">Комментарии</h2>
        <div class="mt-4">
            <div class="comment mb-6">
                <p class="text-gray-800 font-semibold">Иван Иванов</p>
                <p class="text-gray-600">Отличное мероприятие! Получил много полезной информации.</p>
            </div>
            <div class="comment mb-6">
                <p class="text-gray-800 font-semibold">Анна Смирнова</p>
                <p class="text-gray-600">Организация на высшем уровне. Спасибо!</p>
            </div>
            <h3 class="text-xl font-semibold text-gray-800 mt-6">Оставить комментарий</h3>
            <form action="/events/comment" method="POST" class="mt-4">
                <textarea name="comment" rows="4" class="w-full border-gray-300 rounded-md p-3" placeholder="Ваш комментарий..."></textarea>
                <button type="submit" class="mt-4 px-6 py-2 bg-green-600 text-white rounded-md hover:bg-green-500">Отправить</button>
            </form>
        </div>
    </div>
</div>
    </div>
  </div>
    </div>
  </div>

</body>
<?php
$jsonArray = json_encode($event);
?>
<script>
	var card = <?php echo $jsonArray; ?>;
    ymaps.ready(init);
        function init() {
            var myMap = new ymaps.Map('map', {
                center: [card.event_point_x, card.event_point_y],
                zoom: 9
            });

            var myPlacemark = new ymaps.Placemark(
					[card.event_point_x, card.event_point_y],
					{
						balloonContentHeader: `<div style="font-size: 24px; font-weight: bold; color: #333;">${card.event_title}</div>`,
						balloonContentBody: `
									<div style="font-size: 14px; color: #666;">
											<p>${card.event_description}</p>
											<img src="public/images/${card.event_img}" alt="${card.event_title}" style="max-width: 200px; height: auto; margin-top: 10px; border-radius: 5px;"/>
											<div style="margin-top: 10px;">
													<a href="/card-detail/${card.event_id}" style="
															display: inline-block;
															padding: 10px 20px;
															font-size: 14px;
															color: #fff;
															background-color: #007bff;
															text-decoration: none;
															border-radius: 5px;
															box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
															transition: background-color 0.3s, box-shadow 0.3s;
													" onmouseover="this.style.backgroundColor='#0056b3'; this.style.boxShadow='0 6px 12px rgba(0, 0, 0, 0.3)';" onmouseout="this.style.backgroundColor='#007bff'; this.style.boxShadow='0 4px 8px rgba(0, 0, 0, 0.2)';">Подробнее</a>
											</div>
									</div>`,
						balloonContentFooter: `<div style="font-size: 12px; color: #999; margin-top: 10px;">Дата: ${card.event_date}</div>`,
						hintContent: `<div style="font-size: 14px; color: #333;">${card.event_date}</div>`,
					},
					{
						balloonContentLayout: ymaps.templateLayoutFactory.createClass(`
									<div style="padding: 10px; background-color: #fff; border: 1px solid #ddd; border-radius: 5px;">
											<div class="balloon-header" style="font-size: 16px; font-weight: bold; color: #333;">$[properties.balloonContentHeader]</div>
											<div class="balloon-body" style="font-size: 14px; color: #666; margin-top: 5px;">
													$[properties.balloonContentBody]
											</div>
											<div class="balloon-footer" style="font-size: 12px; color: #999; margin-top: 10px;">
													$[properties.balloonContentFooter]
											</div>
									</div>
							`),
					}
				);
				myMap.geoObjects.add(myPlacemark);
        }
    </script>
		<script>
    const stars = document.querySelectorAll('.star');
    stars.forEach(star => {
        star.addEventListener('click', function() {
            const rating = this.getAttribute('data-value');
            alert('Вы поставили оценку: ' + rating + ' звёзд');
        });
    });
</script>
</html>