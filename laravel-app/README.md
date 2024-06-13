# Laravel Docker AMP Stack

## Prerequisites

- Docker

## Setup Instructions

### 1. Create the `.env` File

Copy the `.env.example` file to a new file named `.env`:
cp laravel-app/.env.example laravel-app/.env

Open the `.env` file and adjust the configuration values as necessary.

### 2. Build Docker Images

Open a terminal and navigate to the project directory. Run the following commands to build the Docker images:
docker build -t laravel-apache -f Dockerfile.apache .
docker build -t laravel-mysql -f Dockerfile.mysql .

### 3. Create Docker Network

docker network create laravel-network

### 4. Run Docker Containers

#### MySQL Container

Run the MySQL container with the following command:
docker run --name mysql --network laravel-network -v mysql-data:/var/lib/mysql -e MYSQL_ROOT_PASSWORD=rootpassword -e MYSQL_DATABASE=laravel -e MYSQL_USER=laraveluser -e MYSQL_PASSWORD=laravelpassword -d laravel-mysql

#### Apache Container

Run the Apache container with the following command:
docker run --name apache --network laravel-network -p 80:80 -p 443:443 -d laravel-apache

### 5. Clear Laravel Cache (inside the Apache container)

Access the Apache container and clear the Laravel cache:
docker exec -it apache bash
cd /var/www/html
php artisan config:cache
php artisan route:cache
php artisan view:clear
exit

### 6. Run Database Migrations (inside the Apache container) and seed

If you have database migrations, run them inside the Apache container:
docker exec -it apache bash
cd /var/www/html
php artisan migrate
exit

docker exec -it apache bash
cd /var/www/html
php artisan db:seed

### 7. Access the Application

Open your browser and navigate to `http://localhost` to access the Laravel application.

