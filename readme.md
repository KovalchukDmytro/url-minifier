# Крон-команды
- Очистка старых URL-ов: docker-compose exec app php artisan clear_expired_urls

# Возможности для улучшений
1. Если нужно собирать больше статистики, то создаем отельную таблицу `statistics`, куда сохраняем данные по каждому просмотру или уже подсчитанные данные по урлу (в зависимости от статистики)
2. Переводим формы на ajax или используем front-end фреймворк, чтоб убрать лишние редиректы и страницы
3. Делаем авторизацию и личный кабинет, чтоб человек мог просматривать свои созданные короткие url-ы
4. Делаем редактирование срока жизни урла, чтоб продлить время собирания статистики
5. Лучше покрываем тестами
6. Переводить последнее время просмотра в часовой пояс пользователя
...
