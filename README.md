# README

CRUD Laravel with authentication system.

Data is managed with seeders.

## Prerequisite
- Apache or Nginx web server

- MySQL database server

## Installation

- Clone the repository
```bash
git clone LINK
```
- Install NPM
```bash
npm install
```
- Install composer
```bash
composer install 
```
- Add the structure of the .env
```bash
copy .env.example .env
```
- Change the data in .env with your access to your database
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravelcrud
DB_USERNAME=root
DB_PASSWORD=
```
- load content
```bash
php artisan migrate:fresh --seed
```
