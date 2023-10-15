# Тестовый проект #
Веб приложение разработан на laravel, обращается по внешнему API к стороннему сайту. Полученные данные обрабатывает и записывает в базу данных mysql. Данные с бд выводит во view.
## Задачи ##
Главными задачами, поставленными перед веб приложением являлись:
1) Страница всех альбомов с пагинацией
2) Страница отображения информации о альбоме
3) Модуль синхронизации(получения) альбомов и треков:
## Требования ##
* Laravel 10
* PHP 8.2
* Node>11
* Composer
* Mysql/Sqlite
## Начало работы ##
1) Клоинрование репозитория
* `git clone https://github.com/Reedhook/Testing_project.git`
2) Установка зависимостей
* `composer install`
3) Переименование `.env.example` в `.env`
4) Изменение параметра QUEUE_CONNECTION для правильной работы очередей
* `QUEUE_CONNECTION=database`
5) Изменение параметров DB для подключения базы данных
* `DB_CONNECTION=mysql`
* `DB_HOST=127.0.0.1`
* `DB_PORT=3306`
* `DB_DATABASE=mydatabase`
* `DB_USERNAME=myuser`
* `DB_PASSWORD=mypassword`
6) Генерирование ключа приложения(Без нее npm не даст запустить сервер. Можно сгенерировать ключ при начале работы сервера при переходе по localhost, либо)
* `php artisan key:generate`
7) Установка зависимостей npm
* `npm install`
8) Запуск npm
* `npm run dev `
9) Мигрция базы данных
* `php artisan migrate`
10) Создания символической ссылки
* `php artisan storage:link`
11) Запуск очередей
* `php artisan queue:work`
12) Получение основных данных с внешнего API
* `php artisan api:get-data`
13) Запуск сервера
* `php artisan serve`
14) Получение треков по внешнему API (Запускать лишь после того, как в бд попали все альбомы. Это можно отследить по jobs)
* `php artisan api:get-track`
