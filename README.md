<p align="center">Daily Quotes Application</p>

## Example using NOVu notification channel

Clone the repository and run composer install command
Run the following commands:
  ```bash
    php artisan breeze:install
    php artisan migrate
    npm install
    npm run dev
  ```
 To make admin user run the seeder
   ```bash
   php artisan db:seed
   ```
 Install novu-laravel SDK using composer
     ```bash
     composer require novu/novu-laravel
     ```

## Configuration
You can publish the configuration file using this command:

```bash
php artisan vendor:publish --tag="novu-laravel-config"
```
A configuration file named 'novu` is created in config directory

### API Keys
Open your `.env` file and add your API Key.

```php
NOVU_API_KEY=xxxxxxxxxxxxx
```

**Note:** Get your API from here [Novu Dashboard](https://web.novu.co/settings).

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**


