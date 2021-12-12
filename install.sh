#Get laravel version
php artisan --version 

#Autoloader Optimization
composer update 
composer install --optimize-autoloader --no-dev  

#Cached data clearing
php artisan cache:clear 
php artisan view:clear 

#Optimizing View Loading
php artisan view:cache  

#Reoptimized Class
php artisan optimize 
php artisan config:clear 

#Migrate + seed
php artisan migrate --seed 

