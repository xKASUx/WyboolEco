<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="/assets/tailwind.js"></script>
    <link rel="stylesheet" href="/assets/css/main.css">
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>

	<title>Создание мероприятия</title>
</head>
<body>
<style>
        #map {
            width: 100%;
            height: 400px;
        }
        .form-group {
            margin-top: 20px;
        }
    </style>

<div class="min-h-screen bg-gray-100 p-0 sm:p-12">
  <div class="mx-auto max-w-md px-6 py-12 bg-white border-0 shadow-lg sm:rounded-3xl">
    <h1 class="text-2xl font-bold mb-8 text-center">Форма создания мероприятия</h1>
    <form id="form" method="POST" action="/events/add" enctype="multipart/form-data">
      <div class="relative z-0 w-full mb-5">
        <input
          type="text"
          name="event_title"
          placeholder="Название меропрития"
          required
          class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
        />
      </div>
      <div class="relative z-0 w-full mb-5">
        <textarea
          type="text"
          name="event_desc"
          placeholder="Описание мероприятия"
          required
          class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
        ></textarea>
      </div>
      <div class="relative z-0 w-full mb-5">
        <input
          type="text"
          name="event_score"
          placeholder="Баллы"
          value=""
          required
          class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
        />
      </div>
      <div class="flex flex-row space-x-4">
        <div class="relative z-0 w-full mb-5">
          <input
            type="text"
            name="event_date"
            placeholder="Дата"
            value=""
            onclick="this.setAttribute('type', 'date');"
            class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
          />
        </div>
      </div>
      <div class="relative z-0 w-full mb-5">
        <input
          type="file"
          name="event_img"
          value=""
          required
          class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
        />
      </div>
        <label>Выберите место проведения мероприятия:</label>
      <div id="map"></div>
    <div class="form-group">
        <label for="coords">Координаты выбранной точки:</label>
        <input type="text" name="event_coords" id="coords" readonly style="width: 300px; padding: 5px;"/>
    </div>
      <a
        href="/events"
        class="w-[280px] pl-16 pr-16 px-6 py-3 mt-3 text-lg text-white transition-all duration-150 ease-linear rounded-lg shadow outline-none bg-red-500 hover:bg-red-800 hover:shadow-lg focus:outline-none"
      >
        Назад
      </a>
      <button
        id="button"
        type="submit"
        class="w-[180px] ml-[35px] px-6 py-3 mt-3 text-lg text-white transition-all duration-150 ease-linear rounded-lg shadow outline-none bg-blue-500 hover:bg-blue-800 hover:shadow-lg focus:outline-none"
      >
        Создать
      </button>
    </form>
  </div>
</div>

</body>

<script>
    ymaps.ready(init);
        function init() {
            var myMap = new ymaps.Map('map', {
                center: [55.753995, 37.614069],
                zoom: 9
            });

            var selectedPlacemark;

            myMap.events.add('click', function (e) {
                var coords = e.get('coords');

                if (selectedPlacemark) {
                    selectedPlacemark.geometry.setCoordinates(coords);
                } else {
                    selectedPlacemark = new ymaps.Placemark(coords, {}, {
                        preset: 'islands#redIcon',
                    });
                    myMap.geoObjects.add(selectedPlacemark);
                }

                document.getElementById('coords').value = coords.join(', ');
            });
        }
    </script>
</html>