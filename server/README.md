This is the backend

# Server

#### Create a .env file in the server folder and enter your configurations, Example

```
HOST="your_domain"
USER_NAME="your_database_username"
PASSWORD="database_password"
DB_NAME="databaase_name"
```

### Navigate to the server folder and run the commands below

## Project setup (install dependencies)

```
composer install
```

### Compiles and hot-reloads the backend

```
php -S localhost:8888
```

### Get all users

```
http://localhost:8888/api/users
```

### Get a single user by phone number

```
http://localhost:8888/api/users/{id}
```

### signup(post)

```
http://localhost:8888/api/signup

Body={
     "phonenumber": "123456987",
    "password": "yourpassword",
    "firstname": "name",
    "lastname": "name"
}
```

### signin(post)

```
http://localhost:8888/api/signin

Body={
     "phonenumber": "123456987",
    "password": "yourpassword"
}
```
