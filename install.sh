echo "Installing FlexAdmin"
composer install
php artisan key:generate --ansi
php artisan migrate
php artisan db:seed
npm install