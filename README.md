## ===== Composer install ===
composer install

## ===== Run Auto Load ===
composer du

## ===== Generate Key (If env not setup) ===
php artisan key:generate

## ===== After DB & ENV Confiqure then run migration ===
php artisan migrate

## ===== Define route on web.php then make controller ===
php artisan make:controller (your controller name)

## ===== Create model set migration ===
php artisan make:model (your model name) -m