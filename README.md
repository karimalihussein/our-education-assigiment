## Project Description

- This Laravel project is designed to read data from two providers in the form of JSON files, insert the data into a relational database, and perform various filtering operations on the data to obtain the desired results. The JSON files can be found in the "jsons" folder and are named "users.json" and "transactions.json".

- The "transactions.json" file contains transaction data with three possible status codes: authorized (1), declined (2), and refunded (3).


## Acceptance Criteria:

- [x] Read the data from the JSON files and insert it into a relational database.
- [x] Filter the results by transaction status code (authorized, declined, refunded).
- [x] Filter the results by currency.
- [x] Filter the results by date range.
- [X] Filter the results by amount range.

## The evaluation of this task will be based on the following criteria:

- [x] Clean, maintainable, and well-structured code that is easy to understand, correct, and upgrade, following the best practices of the language.
- [x] Efficient performance in reading large files.
- [x] Reliability, error-free operation, and proper exception handling.
- [x] Implementation of basic security measures to protect against external attacks.
- [x] Well-designed database schema and class system.
- [x] Optional: Unit tests coverage.

## Task Details (Technical Requirements):
- [x] Check the JSON files and insert the data into the database.
- [x] Create models for User, Transaction, and Balance with the appropriate relationships.
- [x] Define the relationships between the models.
- [x] Create a controller with the appropriate methods to filter the data.
- [x] Implement the logic of the task, including the required filtering operations.
- [x] Create the necessary APIs to fulfill the requirements.
- [x] Optionally, create unit tests to ensure the functionality of the code.

## How to Run the Project Using Docker (Laravel Sail)

* Follow these steps to set up and run the project using Laravel Sail:

- Clone the project from GitHub.
- Run the command `composer install` to install the project dependencies.
- Run the command `cp .env.example .env` to create a copy of the .env file.
- Run the command `php artisan key:generate` to generate the application key.
- Run the command `./vendor/bin/sail up` to start the Docker containers.
- Run the command `./vendor/bin/sail artisan migrate` to run the database migrations.
- Run the command `./vendor/bin/sail artisan db:seed` to run the database seeders.
- Run the command `./vendor/bin/sail` test to run the tests and verify the functionality.

Make sure you have Docker and Laravel Sail installed on your system before running these commands.

Note: You may need to adjust the commands based on your specific environment or requirements.




