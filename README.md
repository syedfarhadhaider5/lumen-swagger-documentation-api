# Lumen Swagger documentation Api

## Introduction
Complete Setup of user role, permission based boilerplate with complete swagger api documentation and ui in laravel lumen
## Prerequisites

Before you begin, ensure you have met the following requirements:

- PHP (version >= 8.0)
- Composer
- Apache Server
- MySQL

## Installation

1. Clone the repository:

   ```bash
   https://github.com/syedfarhadhaider5/lumen-swagger-documentation-api.git
2. Navigate to the project directory:
   ```bash
    cd your-repository
3. Install dependencies:
   ```bash
    composer install
4. Create Database
   ```bash
    add into .env
5. Run database migrations:
   ```bash
    php artisan migrate
6. Two users created:
   ```bash
    Admin
      Email: user1@example.com
      Password: secret
    Dealership Admin
      Email: user2@example.com
      Password: secret
7. Run DB seeder in Following manner in command line
   ```bash
    php artisan db:seed --class=ColorsTableSeeder
    php artisan db:seed --class=DealershipsTableSeeder
    php artisan db:seed --class=MakesTableSeeder
    php artisan db:seed --class=ModelsTableSeeder
    php artisan db:seed --class=UsersTableSeeder
    php artisan db:seed --class=VehiclesTableSeeder
8. swagger publish
   ```bash
    php artisan swagger-lume:publish
    php artisan swagger-lume:generate
9. Note
   ```bash
    Every time you made swagger annotations for api run this command in terminal for saving api in swagger doc json file
    php artisan swagger-lume:generate
## Usage
1. To start the development server, run:
   ```bash
    php -S localhost:8000  public/index.php
2. Access swagger api documentation
   ```bash
   http://localhost:8000/api/documentation
3. Access swagger api documentation
   ```bash
   http://localhost:8000/docs