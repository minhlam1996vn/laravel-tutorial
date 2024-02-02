<!-- Tạo command -->
php artisan make:command UserCommand

<!-- Chạy schedule -->
php artisan schedule:list
php artisan schedule:run
php artisan schedule:work

* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
