Used Laravel-mix with Vuetify 3 and Vuex and laravel-permission.

1. composer install

2. Update .env file as per your configuration (add a DB and valid APP URL)

3. php artisan optimize:clear
4. php artisan key:generate

5. php artisan migrate 
6. php artisan db:seed --class=RootSeeder

7. npm i
8. npm run watch
