
# laravel-microservice

It provides JWT authentication for APIs and session base authentication for portal


## Authors

- [@hamzaaslam](https://github.com/hamzaaslam-cs)


## Installation

# Laravel Project with Vite and SQLite

## Requirements

- **PHP**: Version 8.2 or higher
- **Node.js**: Version 20 or higher

## Getting Started

Follow these steps to set up the project on your local machine.

### 1. Clone the Repository

```bash
git clone [https://github.com/your-repo/laravel-project.git](https://github.com/hamzaaslam-cs/laravel-microservice.git)
```
```bash
cd laravel-microservice
```
### 2. Configure Env
 You can use.

 ```bash
#DB_CONNECTION=sqlite
```
OR
```bash
 DB_CONNECTION=mysql
 DB_HOST=127.0.0.1
 DB_PORT=3306
 DB_DATABASE=laravel-microservice
 DB_USERNAME=root
 DB_PASSWORD=password
```
Install composer dependencies:

```bash
  composer install
```

Install node dependencies:

```bash
  npm install
```


To host vite server:

```bash
  npm run dev 
```


To Run tests :

```bash
  php artisan test 
```

To Run Database Migrations :

```bash
  php artisan migrate 
```

To Run Database Seeder :

```bash
  php artisan db:seed 
```

To host server:

```bash
  php artisan serve 
```

## API Reference

### Authentication
Authorization: Bearer your_access_token

### Content
Content-Type: application/json

### Accept
Accept : application/json

#### Login

```http
  POST /api/auth/login
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `email` | `string` | **Required**.|
| `password` | `string` | **Required**.|


#### Registration

```http
  POST /api/auth/register
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `email` | `string` | **Required**.|
| `password` | `string` | **Required**.|
| `name` | `string` | **Required**.|
| `password_confirmation` | `string` | **Required**.|

#### Logout

```http
  POST /api/auth/logout
```

#### Refresh

```http
  POST /api/auth/refresh
```

#### Create Product

```http
  POST /api/products
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `name` | `string` | **Required**.|
| `quantity` | `number` | **Required**.|
| `price` | `number` | **Required**.|

#### Update Product

```http
  PUT /api/products/{product_id}
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `name` | `string` | **Optional**.|
| `quantity` | `number` | **Optional**.|
| `price` | `number` | **Optional**.|

#### Get Product

```http
  GET /api/products/{product_id}
```

#### Get Products List

```http
  GET /api/products
```

#### Delete Products List

```http
  DELETE /api/products/{product_id}
```

For all apis docs import Laravel Microservice.postman_collection.json file in postman.

https://github.com/hamzaaslam-cs/laravel-microservice/blob/main/Laravel%20Microservice.postman_collection.json

#### Env

```bash

APP_NAME=Laravel-Microservice
APP_ENV=local
APP_KEY=base64:gh7eQrxf1jrTGkdAzIhVtAuNHJ/MxzojiNPn4OL2Aec=
APP_DEBUG=false
APP_TIMEZONE=UTC
APP_URL=http://localhost

APP_LOCALE=en
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=en_US

APP_MAINTENANCE_DRIVER=file
# APP_MAINTENANCE_STORE=database

BCRYPT_ROUNDS=12

LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=sqlite
#DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=laravel-microservice
# DB_USERNAME=root
# DB_PASSWORD=password

SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database

CACHE_STORE=database
CACHE_PREFIX=

MEMCACHED_HOST=127.0.0.1

REDIS_CLIENT=phpredis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=log
MAIL_HOST=127.0.0.1
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

VITE_APP_NAME="${APP_NAME}"

JWT_SECRET=K5BZ6S2nteaoREWrsqcKRsQKYuoeJcPmRjl4fh1S7bTIaP4GxGWNJJBMoCZ0eyja


JWT_ALGO=HS256

```

