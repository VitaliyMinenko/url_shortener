# Url Slug Service.
#### Version 1.0b
#### Author: Vitalii Minenko

A simple application for generating short url slugs.

##### Requriments
- Docker
- WSL 2.0
- PowerShell
- PHP 8.2
##### Haw to start.
- For start application you should install docker and set WSL engine.
- Clone application into the folder with docker.
- Copy env.example to env. and setup necessary variables. 
- Install composer dependencies.
```
composer install
```
Install laravel sail.
```
composer require laravel/sail --dev
```
Setup laravel sail
```
php artisan sail:install
```
Build and start docker containers.
```
bash ./vendor/laravel/sail/bin/sail up
```
After building of containers please make migrations at this way or open container with laravel and push command php artisan migrate.
```
bash ./vendor/laravel/sail/bin/sail artisan migrate
```
Finally, make command npm install

If everything ok Your application will be use http://localhost:3000

Next please do migration and seed main data with next command.
```
sail artisan migrate:refresh --seed
```

If application start successfully you can try to make shorter slugs.
Example of urls
```
urls/urls/urls
urls/asd?urls
urls/asd&urls
urls
```
Now application is ready and you can use it and test it. Please enjoy ;)






