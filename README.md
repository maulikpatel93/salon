<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

-   [Simple, fast routing engine](https://laravel.com/docs/routing).
-   [Powerful dependency injection container](https://laravel.com/docs/container).
-   Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
-   Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
-   Database agnostic [schema migrations](https://laravel.com/docs/migrations).
-   [Robust background job processing](https://laravel.com/docs/queues).
-   [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

-   **[Vehikl](https://vehikl.com/)**
-   **[Tighten Co.](https://tighten.co)**
-   **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
-   **[64 Robots](https://64robots.com)**
-   **[Cubet Techno Labs](https://cubettech.com)**
-   **[Cyber-Duck](https://cyber-duck.co.uk)**
-   **[Many](https://www.many.co.uk)**
-   **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
-   **[DevSquad](https://devsquad.com)**
-   **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
-   **[OP.GG](https://op.gg)**
-   **[CMS Max](https://www.cmsmax.com/)**
-   **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
-   **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

API - POSTMAN
https://www.getpostman.com/collections/5cd3aa0cf5657f688b5e

https://laravel.com/docs/8.x/controllers

sudo chmod 777 -R laravel-backend-frontend

Laravel Project setuap

1. composer create-project laravel/laravel example-app
2. cd example-app
3. php artisan ui bootstrap --auth
4. npm install
5. export NODE_OPTIONS=--openssl-legacy-provider
6. node run dev
7. php artisan serve
8. php artisan migrate
9. composer require doctrine/dbal
10. php artisan migrate:status

cache:clearCommand
php artisan cache:clear
php artisan route:cache
php artisan config:cache

Create Migrate table
php artisan make:migration create_salon_companies_table

Remove migrate
php artisan migrate:rollback

Create Seeder table
php artisan make:seeder RoleSeeder New seeder FileCreate
php artisan db:seed databaseseeder file call
php artisan db:seed --class=RoleSeeder

DB import in class
use Illuminate\Support\Facades\DB;

Creating indexs db in key
primary
unique
index
spatialindex

Any update bs4 to bs5 node js run command
npx mix

Create laravel controller command
php artisan make:controller PhotoController --resource --model=Photo

Create laravel model command
php artisan make:model Flight

Create laravel request command
php artisan make:request StorePostRequest

Create laravel controller component
php artisan make:component Message

//Salon history
php artisan make:migration create_saloon_companies_table --path=/database/migrations/salon_modify
php artisan make:migration create_saloon_services_table --path=/database/migrations/salon_modify
php artisan make:migration create_saloon_staff_services_table --path=/database/migrations/salon_modify

//Product manage
php artisan make:migration create_categories_table --path=/database/migrations/products_modify
php artisan make:migration create_products_table --path=/database/migrations/products_modify

//User Modify
php artisan make:migration create_users_table
php artisan make:migration create_users_table

//Common table
php artisan make:migration create_config_table --path=/database/migrations/common
php artisan make:migration create_email_templates_table --path=/database/migrations/common
php artisan make:migration create_templatefield_table --path=/database/migrations/common

Migrate directory table
php artisan migrate --path=/path/to/your/migration/directory

Cache clear coomand
php artisan cache:clear

Create Middleware
php artisan make:middleware EnsureTokenIsValid

Create Middleware Error pages
php artisan vendor:publish --tag=laravel-errors

1.php artisan make:migration create_users_table
2.php artisan make:migration create_categories_add_column_table --table=categories
3.php artisan make:migration create_categories_remove_column_table --table=categories
4.php artisan make:migration create_categories_add_foreign_key_table --table=categories
5.php artisan make:migration create_categories_remove_foreign_key_table --table=categories

Laravel 8 Multi Authentication – Role Based Login Tutorial
https://onlinewebtutorblog.com/laravel-8-multi-authentication-role-based-login-tutorial/

php artisan grid_view:publish --only=views
php artisan grid_view:publish --only=lang

Any change mix file scss

1. export NODE_OPTIONS=--openssl-legacy-provider
2. node run dev

Live mix changes command npm run watch

npm install anchor-js
npm install is_js
npm install overlayscrollbars

Admin panel generated packages
Install gridview and detail view library

https://github.com/itstructure/laravel-detail-view
https://github.com/itstructure/laravel-grid-view

Multiple form clonData library
https://www.jqueryscript.net/demo/clone-field-increment-id/

Storage folder pass public
php artisan storage:link

"Itstructure\\GridView\\": "composer/itstructure/laravel-grid-view/src/"

'name' => 'required',
'panel' => 'required',

SET @num := 0;

UPDATE your_table SET id = @num := (@num+1);

ALTER TABLE your_table AUTO_INCREMENT =1;
