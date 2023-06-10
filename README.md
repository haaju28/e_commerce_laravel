# Project Readme

This readme file provides instructions on how to run the project, set up the environment, and access the different user accounts.

## Setup Instructions

1. Clone the project repository to your local machine.
2. Navigate to the project directory.
3. Run the following command to install the project dependencies using Composer:

```
composer install
```

4. Create a new file named `.env` in the project root directory.
5. Copy the contents from the `.env.example` file and paste them into the `.env` file you just created.
6. Configure the necessary environment variables in the `.env` file, such as the database connection settings.
7. Create a MySQL database named `sport_store`.
8. Import the SQL file into the `sport_store` database. (You should have a SQL file provided for importing the necessary schema and data.)
9. Run the following command to start the PHP development server:

```
php artisan serve
```

Now you should be able to access the project using a web browser.

## User Accounts

### Admin Account

- Email: admin@gmail.com
- Password: 123456789

### Client Account

- Email: tranvanb@gmail.com
- Password: 123456789

Please use the appropriate account credentials to log in to the respective user roles.

Feel free to reach out if you have any questions or encounter any issues during the setup process.