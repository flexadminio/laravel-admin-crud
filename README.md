## About FlexAdmin: Laravel 10, CRUD, Authentication, Admin Template
https://www.flexadmin.io/documentation/introduction/


## Free Download

https://www.flexadmin.io/downloads/laravel-flexadmin-free/

## Installation

https://www.flexadmin.io/documentation/installation/


## Screenshots

Dashboard | Add New Product  | Update record
--- | --- |---
<img src="https://github.com/flexadminio/flexadmin-laravel-free/blob/master/screenshots/dashboard.jpg" width="400">|<img src="https://github.com/flexadminio/flexadmin-laravel-free/blob/master/screenshots/create-product.png" width="400">|<img src="https://github.com/flexadminio/flexadmin-laravel-free/blob/master/screenshots/update-category.png" width="400">


Product List | Multiple Upload  | Single Upload
--- | --- |---
<img src="https://github.com/flexadminio/flexadmin-laravel-free/blob/master/screenshots/fx-screen1.png" width="400">|<img src="https://github.com/flexadminio/flexadmin-laravel-free/blob/master/screenshots/upload-product.png" width="400">|<img src="https://github.com/flexadminio/flexadmin-laravel-free/blob/master/screenshots/single-upload.png" width="400">


Manage Role | Update Role  | Login
--- | --- |---
<img src="https://github.com/flexadminio/flexadmin-laravel-free/blob/master/screenshots/fx-auth.png" width="400">|<img src="https://github.com/flexadminio/flexadmin-laravel-free/blob/master/screenshots/auth.png" width="400">|<img src="https://github.com/flexadminio/flexadmin-laravel-free/blob/master/screenshots/login.png" width="400">


## Run 

```
docker-compose up
php artisan migrate
php artisan db:seed

```

## Advance

``````
php artisan make:component YourComponent
php artisan migrate:reset
``````

## File upload
Laravel storage filesystem is so unique. Any file upload will be stored in the storage/app/public directory. To make it accessible in public directory, things you need to do is to the create symlink by running the command:

```
php artisan storage:link
```

This command will symlinked storage/app/public to public/storage


## UI

```
npm run dev
```

## Create new Adnin User

```
php artisan admin:create
```

## Create new Model

```
php artisan make:model SomeModel -c
```

## Create admin module

```
generate:admin-model SomeModel
```

## Create new admin component

```
php artisan make:component Admin/YourComponentName
```


### FlexAdmin Generator Commands

```
php artisan flex.scaffold:controller YourModel
php artisan flex:model YourModel
php artisan flex:scaffold YourModel
php artisan flex:rollback YourModel scaffold
```
