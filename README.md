## About Task

1 - Check the json files and insert the data into the database.
2 - Create User and Transaction and Balance models.
3 - make the relationship between the models.
4 - Implement the logic of the task.
5 - Create the API's.
6 - Create the tests.


## How to run the project using docker(laravel sail)

1 - Clone the project from github.
2 - Run the command `composer install` to install the dependencies.
3 - Run the command `cp .env.example .env` to create the .env file.
4 - Run the command `php artisan key:generate` to generate the key.
5 - Run the command `./vendor/bin/sail up` to run the project.
6 - Run the command `./vendor/bin/sail artisan migrate` to migrate the database.
7 - Run the command `./vendor/bin/sail artisan db:seed` to seed the database.
8 - Run the command `./vendor/bin/sail test` to run the tests.


