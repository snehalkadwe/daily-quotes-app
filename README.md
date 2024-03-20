# <p align="center">Daily Quotes Application</p>

## Example using NOVU notification channel

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
A configuration file named `novu` is created in config directory

### API Keys
Open your `.env` file and add your API Key.

```php
NOVU_API_KEY=xxxxxxxxxxxxx
```
**Note:** Get your API from here [Novu Dashboard](https://web.novu.co/settings).

## Setup Workflow in Novu Dashboard
(**Note:** If you are not familiar with Novu and creation of workflows in Novu Dashboard please refer these blogs)
- **[Simplify Communication with NOVU: A Developer's Guide](https://vehikl.com/](https://dev.to/snehalkadwe/simplify-communication-with-novu-a-developers-guide-5e8d)https://dev.to/snehalkadwe/simplify-communication-with-novu-a-developers-guide-5e8d)**
- **[Implementing Novu Notifications with Laravel: A Step-by-Step Guide](https://dev.to/snehalkadwe/implementing-novu-notifications-with-laravel-a-step-by-step-guide-3fni)**

 ### Required Workflow
- **Workflow 1:** for subscribed user -- select only Email channel - provide all required details <br>
- **Workflow 2:** for admin -- select Email, SMS channels (used to notify admin of newly subscribed user) <br>
- **Workflow 3:** for subscribed user -- select Email channel (used to send daily quotes to the user's email address) <br>

To run command in local enviornment using job run this command
```bash
php artisan queue:work
```
