# task-malaeb

## Required PHP 7.4 | 8.0

### first need to run some commands
- composer install
- composer run-script post-root-package-install
- composer run-script post-create-project-cmd

### if you want to ues docker container
- ./vendor/bin/sail up -d
- ./vendor/bin/sail artisan migrate --seed

### if you want to ues normal php
- php artisan migrate --seed
- php artisan serve --port=81

### the **[link](https://documenter.getpostman.com/view/2494634/Tzm8EEvk)** postman collection
