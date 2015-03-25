## LaraCraft E-Commerce App

LaraCraft is a e-commerce web shop built with Laravel 5


### How to use
1. Clone the repository and checkout to develop branch

2. Create a file in the storage directory **storage/database.sqlite**

3. Create a file in the root called **.env**

 1. Copy and paste these line into it
    
    ```APP_ENV=local
    APP_DEBUG=true
    APP_KEY=iauLKL36BzTCOKy0SCZ8ETIXuAWT5G0d
    DB_HOST=localhost
    DB_DATABASE=database.sqlite
    
4. Run these command in the root of project directory

    1. `composer install`
    2. ```php artisan migrate:install```
    3. `php artisan migrate`
    4. `php artisan db:seed`
    5. `php artisan serve`
    
    
### Contributing

For contributing always create your branch an before pushing it run all the test to make sure you didn't break anything

In project root directory run these commands

1. ```vendor/bin/phpunit```
2. ```vendor/bin/behat```

#### License

The LaraCraft is a closed-source software owned by MohammadReza Nasirloo (mamareza.mrn@gmail.com)  &copy; 2015

Any use of this software without owner permission is not allowed.
