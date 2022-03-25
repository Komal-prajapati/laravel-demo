## TripZone Website

A simple Travel based informative website built with Laravel and Bootstrap.

----

### Steps to install

Clone this repository
```
git clone git@github.com:git-yourdevexpert/tripzone.git
```

Enter into the project root
```
cd tripzone
```


Install the composer dependencies
```
composer install
```

Create the .env file
```
cp .env.example .env
```

Update the Database credentials in the newly created .env file
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=<db-name-here>
DB_USERNAME=<db-username>
DB_PASSWORD=<db-password>
```

Migration and Seeding
```
php artisan migration --seed
```

Link the storage folder to public directory
```
php artisan storage:link
```

Install and compile npm dependencies. Only for development. Not required in production/live site.
```
npm install && npm run prod
```
