## Test Driven Sample

Built with Laravel 10. It requires PHP 8.1+ to run. 

### Local Setup
After cloning the repo, following the next steps:

- install deps:
```
composer install
``` 

- copy `.env.example` to `.env`
```
cp .env.example .env
```

- generate app key:
```
php artisan key:generate
```

- create a DB in your local DB engine. suggested DB named: `test_db`

- update DB envs in `.env` to match your local DB engine

- migrate and seed the DB:
```
php artian migrate --seed
``` 
- run the application:
```
php artisan serve
```
## Future Work:
- Add Laravel Sail (setup with Docker)
- 
