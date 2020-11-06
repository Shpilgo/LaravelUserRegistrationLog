# Laravel User registration log

## Installation guide
1. Clone GitHub repo for this project locally in to the folder you are create fo the project
> `git clone https://github.com/Shpilgo/LaravelUserRegistrationLog.git .`

2. Install Composer using this guide: https://getcomposer.org/download/

3. Install Composer Dependencies
> `composer install`

4. Install NPM Dependencies
> `npm install`

5. Create a copy of your .env file
> `cp .env.example .env`

6. Generate an app encryption key
> `php artisan key:generate`

7. Create an empty database for our application

8. In the .env file, add database information to allow Laravel to connect to the database
> `DB_CONNECTION=mysql`, `DB_HOST=127.0.0.1`, `DB_PORT=3306`, `DB_DATABASE=db_name`, `DB_USERNAME=db_username`, `DB_PASSWORD=db_password`

9. Migrate the database
> `php artisan migrate`

10. In the .env file, add mail send information to allow Laravel to connect to the email server
> `MAIL_MAILER=smtp`, `MAIL_HOST=smtp.gmail.com`, `MAIL_PORT=465`, `MAIL_USERNAME=user.name@gmail.com`, `MAIL_PASSWORD=gmail_password`, `MAIL_ENCRYPTION=ssl`, `MAIL_FROM_ADDRESS=user.name@gmail.com`, `MAIL_FROM_NAME="${APP_NAME}"`
