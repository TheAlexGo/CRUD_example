# CRUD_example
Пример реализации CRUD'а на Laravel 8

## Требования
- Установить php-7.4+
- Установить MySQL
- Установить composer

## Установка
- Перейти в нужную директорию через командную строку (cd ...)
- Клонировать репозиторий: `git clone https://github.com/TheAlexGo/CRUD_example.git`
- Установить зависимости: `composer install`
- Определить database и APP_KEY в .env
- Установить миграции: `php artisan migrate --seed`
- Запустить приложение: `php artisan serve`

## Запуск через Docker
- Создать файл .env по прототипу .env.example
- Указать настройки подключения к базе данных, основываясь на конфигурации в docker-compose.yml
- Запустить проект через: `docker-compose up -d`
