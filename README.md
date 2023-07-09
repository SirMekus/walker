## Installation

For these instructions I assume you have a development server on your local machine.
If you don't the below could differ a bit especially in the area of URL for navigation. It is believed your URL will be served from "localhost" (or 127.0.0.1). However, no matter where it will be served from the output and instruction should still remain the same.

1. Clone this repository
1. Run `composer install`
1. Create and fill the .env file (example included /.env-example)
1. Run `php artisan migrate` to create database tables
1. Seed the database with random Drivers by running `php artisan db:seed DriverSeeder`
1. Seed the database with random vehicles by running `php artisan db:seed VehicleSeeder`
1. Seed the database with random Clients by running `php artisan db:seed ClientSeeder`
1. Seed the database with our main User by running `php artisan db:seed SpecialUserSeeder`. This command will create a user account with 'super abilities'. Okay, I guess I'm being too 'super-heroic'; it simply means the ability to log in and use the 'platform' The credentials are below.
1. Run `php artisan storage:link`

1. Visit http://your-backend/login and happy surfing

At this juncture, welcome on board, boss.

Login details: mekus600@gmail.com / password

> Please note that a Relational database (MySQL) was used in this project because of its ease of definition of relationship among entities, flexibility as well as its ease of use.

>NB: visit localhost/api/documentation for the documentation