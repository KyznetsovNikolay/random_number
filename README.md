<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Запуск приложения:

Для запуска необходимо выполнить следующие комманды:

- make build
- make up
- make migrate

После запуска всех комманд приложение готово к работе.

## Проверка работоспособности

Имеется возможность сгенерировать число используя эндпоинты, а также используя консоль artisan

### Через эндпоинты:

- Хост localhost
- Для генерации используется uri /generate . В базе генерируется рандомное число.
    - request  /generate
    - response [$id => $randomNumber]
- Для возврата значения используется /retrieve/{id} . Возвращается сгенерированное ранее рандомное число, если есть соответствие id. Если соответствия id нет, возвращается предупреждение, что такого id не существует.

### Через консоль artisan:

- Для входа в контейнер с приложением: make app_bash
  Затем:
    - php artisan number:generate . В базе генерируется рандомное число.
    - php artisan number:retrieve id . Возвращается сгенерированное ранее рандомное число, если есть соответствие id. Если соответствия id нет, возвращается предупреждение, что такого id не существует.
