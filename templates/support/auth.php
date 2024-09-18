<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet" />
	<link rel="stylesheet" href="/assets/main.css">
	<script src="/assets/tailwind.js"></script>
	<link rel="shortcut icon" href="public/images/favicon.svg" type="image/x-icon">

	<title>Авторизация</title>
</head>
<body>
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <a href="/"><img class="mx-auto h-10 w-auto" src="public/images/LogoForest.svg" alt="Вайбул Эко"></a>
    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Войдите в ваш аккаунт</h2>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" action="/sign-in" method="POST">
      <div>
        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Почта</label>
        <div class="mt-2">
          <input id="email" name="email" type="email" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
        </div>
      </div>

      <div>
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Пароль</label>
          <div class="text-sm">
            <a href="#" class="font-semibold text-green-600 hover:text-green-700">Забыли пароль?</a>
          </div>
        </div>
        <div class="mt-2">
          <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
        </div>
      </div>

      <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-green-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-green-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">Войти</button>
      </div>
    </form>

    <p class="mt-10 text-center text-sm text-gray-500">
      Нет аккаунта?
      <a href="/reg" class="font-semibold leading-6 text-green-600 hover:text-green-700">Зарегистрироваться сейчас</a>
    </p>
  </div>
</div>
</body>
</html>