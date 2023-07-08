## Installation

For these instructions I assume you have a development server on your local machine.
If you don't the below could differ a bit especially in the area of URL for navigation. If your URL won't be served from a "localhost" (or 127.0.0.1) then you may experience CORS issue. In this case just send me the domain from which you're testing so that I can add it to the 'Whitelist'

1. Clone this repository
1. Run composer install
1. Create and fill the .env file (example included /.env-example)
1. Run `php artisan migrate` to create database tables
1. Seed the database by running `php artisan db:seed`
1. Seed the database by running `php artisan db:seed --class=SpecialAdminSeeder`. This command will create a default Admin account with super abilities such that you can then log in. The credentials are below.
1. Run `php artisan storage:link`

1. Visit http://your-backend/login and happy surfing

Login details: mekus600@gmail.com / password

> Please note that for all admins and users created their default passwords are "password" and their username can be fetched from the database - in this case their email address.