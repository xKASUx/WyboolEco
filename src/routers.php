<?php

// Выполнила команда разработчиков WyboolDev | dev.wybool.ru

return [
    '~^$~' => [\core\controllers\HomeController::class, 'responseHome'], // Главная страница

    '~^auth$~' => [\core\controllers\HomeController::class, 'responseAuth'], // Страница "Авторизация"
    '~^reg$~' => [\core\controllers\HomeController::class, 'responseReg'], // Страница "Регистрация"
    '~^profile$~' => [\core\controllers\HomeController::class, 'responseProfile'], // Страница "Личный кабинет"

    '~^sign-in$~' => [\core\controllers\HomeController::class, 'handlerAuth'], // Обработчик "Авторизация"
    '~^sign-up$~' => [\core\controllers\HomeController::class, 'handlerReg'], // Обработчик "Регистрация"
    '~^sign-out$~' => [\core\controllers\HomeController::class, 'handlerLogout'], // Обработчик закрытия сессии
];
