## About FlexAdmin: Laravel 10, CRUD, Authentication, Admin Template
https://www.flexadmin.io/documentation/introduction/

## Installation

https://www.flexadmin.io/documentation/installation/

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
npm run dev


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
