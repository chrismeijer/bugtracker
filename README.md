# BugTracker on Laravel

This document informs about how I have developed this BugTracker application. 

## Scope of the Project

To make sure there are no misunderstandings I came up with this project scope:

**The BugTracker:**
  - Must have a login possibility
  - Users can register and become a customer-role

**Actions:**
  - Cannot be mutated
  - Are there to navigate and operate through the application
  - Can be a menu-option, a submenu-option or a loose button/link

  - **Executable actions:**
    - CRUD Users
    - CRUD Roles
    - CRUD Bugs
    - CRUD Comments
    - CRUD Categories
    - CRUD Statuses
    - CRUD Priorities
    - CRUD Resolutions
    - CRUD Attachments

**Users:**
  - Can be mutated by the administrative-role
  - Can edit it's own account
  - Are all in the same table
  - Must have a role
  - Can only have one role 

  - **Standard actions executable by users:**
    - Can login/logout
    - Can create a bug
    - Can edit own bugs
    - Can reopen own bugs
    - Can make comments
    - Can edit own comments
    - Can remove own comments

**Roles:**
  - Can only be mutated by the administrative-role
  - Can perform one or more actions to operate and navigate

  - **Extra actions executable by roles:**
    - Administrator:
      - Can mutate users
      - Can mutate roles
      - Can mutate categories
      - Can mutate statuses
      - Can mutate priorities
      - Can mutate resolutions
      - Can mutate comments
      - Convert bug status
      - Convert bug resolution
      - Can assign bug to administrator or employee
      - Can reopen bugs

    - Employee:
      - Can convert bug status
      - Can convert bug resolution
      - Can assign bug to employee itself
      - Can remove customers comments
      - Can reopen bugs


**Bugs:**
  - Needs a title and description
  - Needs a resolution
  - Needs a priority
  - When no priority is used, then priority is 0 (no priority)
  - Needs a category
  - Can have an attachment

## Used Commands

Below is the explanation of how I setup the models, controllers and migrations.

## Models

All of the models below can be mutated by the administrator, so the parameters ***-m*** and ***-c*** are added 

```bash
php artisan make:model Role -m -c
php artisan make:model Category -m -c
php artisan make:model Priority -m -c
php artisan make:model Resolution -m -c
php artisan make:model Status -m -c
php artisan make:model Attachment -m -c
php artisan make:model Bug -m -c
```

## Pivot Tables

The pivot tables are there for relationships between models. 

## Controllers

There's one controller added to the application. This controller 

## Migrations

Because of the presence of the create-user-table migration and the create_password_resets_table migration, these two migrations are left alone. Only the create-user-table migration is expanded with a role_id, soft-delete column. 

To setup the BugTracker with a predefined user as administrator, the create-user-table migration is extended with a query to populate the user-table. 

**Other Migrations:**

```bash
php artisan make:migration create_actions_table --create=actions
```

## Foreign Key Constraints

```bash
php artisan make:migration create_user_to_role_foreign_key --table=users
```

## Seeders
To populate tables I added seeders for the following entities:

  - Actions
  - Users
  - Roles
  - Categories
  - Priorities
  - Statuses
  - Resolutions

The commands I used: 

```bash
php artisan make:seeder ActionsTableSeeder
php artisan make:seeder UsersTableSeeder
php artisan make:seeder RolesTableSeeder
php artisan make:seeder CategoriesTableSeeder
php artisan make:seeder PrioritiesTableSeeder
php artisan make:seeder StatusesTableSeeder
php artisan make:seeder ResolutionsTableSeeder
```

## MAYBE BELOW 
For users with role customer I've added a factory

Factory->Insert a lot of data 

## Install and run

Don't forget to create a database and fill in the correct db-parameters.

```bash
git clone
composer install
cp .env.example .env
php artisan migrate --seed
php artisan serve
```