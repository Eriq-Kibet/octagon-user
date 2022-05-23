This is the backend

# Server

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
### signup
```
http://localhost:8888/api/signup

Body={
     "phonenumber": "123456987",
    "password": "yourpassword",
    "firstname": "name",
    "lastname": "name"
}
```
