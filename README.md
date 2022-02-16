#How to run project

- Create a database in your XAMPP MySQL
- Copy and Paste the `.env.example` file and rename to `.env`
- Inside the .env file, rename the `DB_DATABASE` to your DB name
- In your terminal, run `composer update`
- Then, run `php artisan key:generate`
- Run `php artisan migrate:refresh --seed`
- Run `composer dump-autoload`
