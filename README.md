# Instructions Flow for php artisan

This document informs about how I setup the models, controllers and migrations.

## Models

All of the models

```bash
php artisan make:model Category -m
php artisan make:model Bug -m
php artisan make:model Priority -m
php artisan make:model Resolution -m
php artisan make:model Role -m
php artisan make:model Status -m
```

## Controllers

## Migrations

Because of the presence of the create-user-table migration and the create_password_resets_table migration, these two migrations are left alone. Only the create-user-table migration is expanded with a role_id, soft-delete column. 

To setup the BugTracker with a predefined user as administrator, the create-user-table migration is extended with a query to populate the user-table. 

```bash
```