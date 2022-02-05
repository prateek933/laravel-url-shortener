# Laravel URL Shortener

### 1. Introduction:

With the help of laravel URL shortener, you can reduce your long url to short. Easy to share them with your friends, families and colleagues. This package list down the shortened url on the home page and whenever user click on the short URL it will be redirected to the original URL. We have added a validation for URL such that no user can add text other than URL.

### 2. Installation:

* Run the below commands to setup the laravel project. 
~~~
composer create project laravel/laravel url-shortener
~~~

* Edit the .env file located in your root directory and fill the database credentials and APP_URL of your project, then run the below commands

~~~
composer dump-autoload
php artisan route:clear
php artisan migrate
~~~

> That's it, now just execute the project on your specified domain.