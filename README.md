## How to setup project

To setup the project in your local system for development follow the steps below:

1. Make sure you make the .env file using the .env.example as reference.
2. Create the database and import the SQL file in the <code>_DB</code> folder
3. Run <code>composer install</code>
4. To compile the frontend assets run <code>npm install && npm run dev</code>
5. FInally run <code>php artisan key:generate</code> to generate the app key.

_*Additionally the admin login route can be found at "/login".*_


