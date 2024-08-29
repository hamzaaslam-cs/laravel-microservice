
# laravel-microservice

It provider JWT authentication for APIs and session base authentication for portal

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
cd laravel-microservice
```
### 2. Configure Env
 You can use.
#DB_CONNECTION=sqlite

OR

 DB_CONNECTION=mysql
 DB_HOST=127.0.0.1
 DB_PORT=3306
 DB_DATABASE=laravel-microservice
 DB_USERNAME=root
 DB_PASSWORD=password

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

To host api server:

```bash
  php artisan serve 
```

To Run tests :

```bash
  php artisan test 
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




