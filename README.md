## Used Laravel-mix with Vuetify 3 and Vuex and laravel-permission.

1. composer install

2. Update .env file as per your configuration (add a DB and valid APP URL)

3. composer require --dev laravel/dusk

4. php artisan dusk:install

5. php artisan dusk:chrome-driver --detect

6. php artisan optimize:clear

7. php artisan key:generate

8. php artisan migrate 

9. php artisan db:seed --class=RootSeeder

10. npm i

11. npm run watch

## Used Laravel Dusk for Unit test.

### Run this command for Unit test.

Open .env file and change APP_URL as http://localhost:8000

`php artisan serve`

`php artisan dusk`
