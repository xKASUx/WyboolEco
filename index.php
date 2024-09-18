<?php

// Выполнила команда разработчиков WyboolDev | dev.wybool.ru

session_start();

spl_autoload_register(function ($name){
    require_once __DIR__ . '/src/' . str_replace('\\', '/', $name) . '.php';
});

$flag = false;
$rout = $_GET['rout'] ?? '';
$routers = require __DIR__ . '/src/routers.php';

foreach ($routers as $pattern => $value)
{
    preg_match($pattern, $rout, $match);
    if(!empty($match))
    {
        $flag = true;
        break;
    }
}

if(!$flag)
{
    require_once  __DIR__ .'/templates/support/404.php';
    return;
}

unset($match[0]);

$className = new $value[0];
$classMethod = $value[1];


$className->$classMethod(...$match);

