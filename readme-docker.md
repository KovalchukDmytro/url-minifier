# Основные команды
- Создать app: docker-compose build app
- Поднять докер: docker-compose up
- Поднять докер в фоне: docker-compose up -d
- "Убить" докер: docker-compose down 
# artisan-команды:
- Сбросить кеш: docker-compose exec app php artisan optimize
- Выполнить миграции: docker-compose exec app php artisan migrate
# composer-команды:
- Установка зависимостей: docker-compose exec app composer install
