# About the project
With this Laravel app you can see the most frequently drawn lottery numbers in order.<br/>
In addition you can also generate a new lottery draw, by selecting the date and 5 numbers, which must be different.<br/>

# Applied technologies
- php
- laravel

# Getting started
After cloning this project you need to run the next lines in terminal:
- composer install
- npm install
- cp .env.example .env
- php artisan key:generate
- php artisan serve
- php artisan migrate

At first time running you need to recomment the apropriate section in web.php in order to upload the database with the data from the csv file.<br/>
After that you can comment this section again.


