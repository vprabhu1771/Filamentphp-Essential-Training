# 1 - Filament Installation

 
```
composer create-project laravel/laravel example-app
```

```
cd example-app
```

```
php artisan serve
```

```
php artisan migrate
```

```
composer require filament/filament:"^3.1" -W
```

```
php artisan filament:install --panels
```

```
php artisan make:filament-user

  Name:
❯ admin

  Email address:
❯ admin@gmail.com

  Password:
❯ admin

INFO  Success! admin@gmail.com may now log in at http://127.0.0.1:8000/admin/login.
```

https://github.com/filamentphp/demo