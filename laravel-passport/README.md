composer require laravel/passport
php artisan vendor:publish --tag=passport-migration
php artisan migrate
php artisan passport:install
