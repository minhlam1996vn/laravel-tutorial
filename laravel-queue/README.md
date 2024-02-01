php artisan queue:table
php artisan migrate

QUEUE_CONNECTION=database

php artisan make:job AddSystemLogJob 
php artisan queue:work

<!-- php artisan queue:work --timeout=60 -->
<!-- php artisan queue:work --tries=3 -->

<!-- 
+ Khi cập nhật code trong job thì cần chạy lại lệnh: php artisan queue:restart
+ Khi chạy queue tự động trên server có thể lựa chọn các phương án sau
    1. Suppervisor (Trên Linux) => Lựa chọn hàng đầu
    2. Cronjob (Trên Linux)
    (vd khi chạy "crontab -e" trên linux: `***** php /home/laravel-queue/public_html/artisan queue:work --stop-when-empty`)
    3. Task Schedule Laravel
 -->
