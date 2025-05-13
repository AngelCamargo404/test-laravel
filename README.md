# Laravel test

## Project Features
- Fetch employee data from [Dummy REST API](http://dummy.restapiexample.com/api/v1/employees)
- Queue system for background processing
- Database storage for employee records
- Artisan command for data fetching
- Job processing with Laravel Queues

## Installation & Setup

1. **Clone the repository**
   ```bash
   git clone https://github.com/AngelCamargo404/test-laravel.git
   cd project-name

2. **Install depedencies**
    ```bash
    composer install

3. **Configure environment**
    ```bash
    Update your database config in .env file:
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel
    DB_USERNAME=root
    DB_PASSWORD=

4. **Run migrations**
    ```bash
    php artisan migrate

5. **Set up queue tables**
    ```bash
    php artisan queue:table
    php artisan migrate

## Usage

1. **Fetch data from API**
    ```bash
    php artisan fetch-data

2. **Process the queue**
    ```bash
    php artisan queue:work

## Queue Configuration
### By default, the project uses the database queue driver. You can modify this in .env:
   ```bash
   QUEUE_CONNECTION=database