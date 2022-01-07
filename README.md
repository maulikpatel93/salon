# 🚀 Welcome to your new awesome project!

#Laravel Curret Salon Project setuap
======================================================================================================
#Salon Project setuap- Command with filechanges

1. check .env file (Database Name change)
2. composer install (Composer letest verison)
3. npm install (node package letest verison)
4. php artisan migrate
5. php artisan db:seed  (Data insert in datatable)
6. php artisan passport:install (Api use command)
7. php artisan storage:link
8. php artisan vendor:publish --tag=laravel-errors
9. sudo chmod 777 -R project/storage
10. sudo chmod 777 -R project/public
11. itstructure/laravel-detail-view and itstructure/laravel-grid-view  override vendor folder (Copy and paste in vendor folder)
================================================================================================================================

#Laravel New Project setuap
1. composer create-project laravel/laravel example
2. cd example
3. php artisan ui bootstrap --auth
4. npm install
5. export NODE_OPTIONS=--openssl-legacy-provider
6. node run dev
7. php artisan serve
8. php artisan migrate
9. composer require doctrine/dbal
10. php artisan migrate:status

#cache:clearCommand
php artisan cache:clear
php artisan route:cache
php artisan config:cache

#Create Migrate table 
php artisan make:migration create_salon_companies_table

#Remove migrate
php artisan migrate:rollback

#Create Seeder table 
php artisan make:seeder RoleSeeder   (New seeder FileCreate)
php artisan db:seed  (databaseseeder all file run)
php artisan db:seed --class=RoleSeeder (Only single File run)

#DB import in class
use Illuminate\Support\Facades\DB;

#Creating indexs db in key
primary
unique
index
spatialindex

#Any update bs4 to bs5 node js run command
npx mix

#Create laravel controller command
php artisan make:controller PhotoController --resource --model=Photo

#Create laravel model command
php artisan make:model Flight

#Create laravel request command
php artisan make:request StorePostRequest

#Create laravel controller component
php artisan make:component Message

#database create table command
php artisan make:migration create_users_table
php artisan make:migration create_config_table --path=/database/migrations/common

#Migrate directory table
php artisan migrate --path=/path/to/your/migration/directory

#Create Middleware
php artisan make:middleware EnsureTokenIsValid

#Create Middleware Error pages
php artisan vendor:publish --tag=laravel-errors

#GridView laravel admin panel
"Itstructure\\GridView\\": "composer/itstructure/laravel-grid-view/src/"

#Database Primary key autoincrement reset
SET  @num := 0;
UPDATE your_table SET id = @num := (@num+1);
ALTER TABLE your_table AUTO_INCREMENT =1;

#Server Side databse export to seed file command
php artisan iseed roles
php artisan iseed modules
php artisan iseed permissions
php artisan iseed roles_access
