### Requirements
    - PHP 7.4
    
### Steps to configure project

##### config project .env

##### execute migrations (php artisan migrate)

##### install boostrap with auth
composer require laravel/ui
php artisan ui bootstrap --auth
npm install && npm run dev

##### execute seeder
php artisan db:seed --class="CreateUsersSeeder"

##### create storage link
php artisan storage:link


#### Public URL for test:

######project home url: http://0679fdcbadb0.ngrok.io
######project admin url: http://0679fdcbadb0.ngrok.io/admin/home
######project admin login url: http://0679fdcbadb0.ngrok.io/admin/login

###### admin user:
user: admin@admin.com
password: password

###### regular user:
user: user@user.com
password: password
