<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="/assets/tailwind.js"></script>
	<title>Мероприятия</title>
</head>
<body>
    <a href="https://вайбул-эко.рф/profile" class="mt-5 mb-5 w-full inline-flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-600">Назад</a>
    <a href="/events/add-page" class="mt-5 mb-5 w-full inline-flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-600">Создать</a>
<table class="border-collapse w-full">
    <thead>
        <tr>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Название</th>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Описание</th>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Дата</th>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Координаты</th>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Баллы</th>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Изображение</th>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Действия</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($events as $event):
        ?>
        <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Название</span>
				<?= $event['event_title'] ?>
            </td>
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Описание</span>
                <?= $event['event_description'] ?>
            </td>
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Дата</span>
                <?= $event['event_date'] ?>
            </td>
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Координаты</span>
                <?= $event['event_point_x'] . ',' . $event['event_point_y'] ?>
            </td>
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Баллы</span>
                <span class="rounded bg-yellow-400 py-1 px-3 text-xs font-bold"><?= $event['event_points'] ?></span>
            </td>
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center flex justify-center relative lg:static">
                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Изображение</span>
                <img class="w-1/2" src="public/images/<?= $event['event_img'] ?>" alt="<?= $event['event_title'] ?>">
            </td>
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Действия</span>
                <a href="/events/points-page/<?= $event['event_id']?>" class="font-medium text-green-600 dark:text-green-500 hover:underline">Выдать баллы</a>
                <a href="/events/update-page/<?= $event['event_id']?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Редактировать</a>
                <a href="/events/delete/<?= $event['event_id']?>" class="font-medium text-red-600 dark:text-red-500 hover:underline">Удалить</a>
            </td>
        </tr>
        <?php
            endforeach;
        ?>
    </tbody>
</table>
</body>
</html>