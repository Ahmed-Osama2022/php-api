# PHP API
- This is a simple php-api project to make an API for your application using PHP native.

## REQUIRMENTS
- PHP v7.4 or higher.
- composer

## Download and install 
```bash
git clone https://github.com/ahmed-osama2022/php-api
cd php-api
composer install
```
- Then serve the public folder
```bash
# if you're using php-cli 
php -S localhost:8000 -t public
```


### example of .env file
- You should put your ```.env``` file at the root folder in the project.
```env
DB_HOST=
DB_NAME=
DB_PORT=
DB_USER=
DB_PASS=
```

### Check if it is working fine
- If you start serving the project you should see this welcome page at your serving link.

![Welcome screen](./php-api-welcome-page.png)


### How to work with?
#### NOTE: This library uses ```MVC``` in the structure.
- Define all your routes as explained in the ```src/Router.php``` file.

- Put all your credintials for the database in the ```.env``` file.

- 
