## LaraCraft Marketplace App

LaraCraft is a marketplace app built with Laravel 5

**NOTE: This is an old pet project which didn't make it to the end but its a good project for how to develop with TDD/BDD**

### How to use
1. Clone the repository and checkout to develop branch

2. Create a file in the storage directory **storage/database.sqlite**. Create a file in the root called **.env*

 1. Copy and paste these line into it

    ```
    APP_ENV=local
    APP_DEBUG=true
    APP_KEY=YOUR_KEY
    DB_HOST=localhost
    DB_DATABASE=database.sqlite
    ```

4. Run these command in the root of project directory

    ```
    composer install
    php artisan migrate:install
    php artisan migrate
    php artisan db:seed
    php artisan serve
    ```


### Contributing

For contributing always create your branch and before pushing it run all the test to make sure you didn't break anything

In project root directory run these commands

1. ```vendor/bin/phpunit```
2. ```vendor/bin/behat```

#### License
```
MIT License

Copyright (c) 2018 M. Reza Nasirloo

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
```