# Livewire Movie App

## Description

webapp allows to generate movies series and season using themoviedb.org apis with jetstream auth.

> This project could be extended in the future to CRUD user from the admin panel. This is just to mimic the backend task.

## Prerequisite
- PHP 8
- Laravel 8
- Mysql for database
- frontend tmplate engine livewire blade with vue files 

## Installation

### Step 1.
- Begin by cloning this repository to your machine 
```
git clone repo url 
```

- Install dependencies
```
composer install
```

- Create enviromental file and variables
```
cp .env.example .env
```

- Generate app key
```
php artisan key:generate
```

### Step 2
- Next, create a new database and reference its name and username/password in the projects .env file. Below the database name is "database_name"
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database_name
DB_USERNAME=root
DB_PASSWORD=your_password
```

- Run migration
```
php artisan migrate or php artisan migrate:fresh
```

### Step 3
- before start you need to run this command in order to access the admin panel
```
php artisan db:seed

```

### Step 4
- To start the server, run the command below
```shell
$ php artisan serve
```

## Testin tools
- phpunit

## Implemented Features
- Users can login into the admin panel (admin@storex.com, password:-123456) for admin, (user@storex.com, password:-123456) for user => access denaied 
- Users can generate a movie by adding the moive id first then generate
- Users can edit movie detail
- Users can delete movie 

## Applications Routes
```
http://127.0.0.1:8000/admin =>for backend
http://127.0.0.1:8000/ =>for frontend
```

## Author
- ibrahim khalaf
