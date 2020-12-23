## How to setup project

To setup the project in your local system for development follow the steps below:

1. Make sure you make the .env file using the .env.example as reference.
2. Create the database and import the SQL file in the <pre>_DB</pre> folder
3. Run <pre>composer install</pre>
4. To compile the frontend assets run <pre>npm install && npm run dev</pre>
5. FInally run <pre>php artisan key:generate</pre> to generate the app key.

_*Additionally the admin login route can be found at "/login".*_


