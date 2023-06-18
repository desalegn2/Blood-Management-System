1.Install Dependencies: Open a terminal or command prompt and navigate to the project's root directory. Run the following command to install the required dependencies:

composer install

2.Environment File: In the project's root directory, you'll find an .env.example file. Copy this file and rename it to .env or rename .env.example to .env

cp .env.example .env

3.Generate Application Key: Run the following command to generate a new application key:

php artisan key:generate

4.Configure Database: Open the .env file and update the database settings according to your local environment. Set the DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, and DB_PASSWORD variables to match your database configuration.

5. update the values of MAIL_USERNAME and MAIL_PASSWORD with your own Gmail account credentials to ensure that the email functionality works correctly. Additionally, you may want to update the MAIL_FROM_ADDRESS and MAIL_FROM_NAME values to match your desired sender details.

6.Run Migrations: Laravel uses migrations to create the database schema. Run the following command to migrate the database:
php artisan migrate

7.Run Seeders: Seeders are used to populate the database with initial data.to seed the database with the the admin cridential. Run the following command to run the seeders:

php artisan db:seed --class=adminCredential

8.Serve the Application: To run the application locally, use the serve command:

php artisan serve
