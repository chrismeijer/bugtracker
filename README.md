# BugTracker on Laravel

This document informs about how I have developed this BugTracker application. 

## Current status

The current status is that it's not fully completed yet! The main parts which are needed to be added, are:

 - Fix font-awesome icons (see also [#17](/../../issues/17))
 - Add attachments to a bug (see also [#4](/../../issues/4))
 - Switch to soft deleted users (see also [#16](/../../issues/16))
 - Create a view to set the permissions per role (see also [#11](/../../issues/11))
 - Change bugs (see also [#4](/../../issues/4))

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
  - Extra tab on the add- and edit-page to set the permissions

  - **Extra actions executable by roles:**
    - Administrator:
      - Can mutate users
      - Can provide any role to a user
      - Can mutate bugs
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
      - Can mutate users
      - Can provide any role except administrator to a user
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

## Policies

A user may always edit it's own account. The edit user URL is based on an user-id. Because of this, the user can change the ID in the URL and request the edit page for an other user. To check this I added a UserPolicy to verify actions based on the role of the user.  

```bash
php artisan make:policy UserPolicy
```

## Controllers

Only to mutate the user, a UserController is added with parameter ***-r***.

```bash
php artisan make:controller UserController -r
```

## Models

All of the models below can be mutated by the administrator, so the parameters ***-mcr*** are added.

```bash
php artisan make:model Role -mcr
php artisan make:model Category -mcr
php artisan make:model Priority -mcr
php artisan make:model Resolution -mcr
php artisan make:model Status -mcr
php artisan make:model Attachment -mcr
php artisan make:model Bug -mcr
```

## Pivot Tables

The pivot tables are there for relationships between models. 

  - Permissions (Role to Action)

## Controllers

Not every user may view a page. So I added a permissions controller to check for the logged in users role_id and requested route name. 

```bash
php artisan make:controller PermissionController
```

## Migrations

Because of the presence of the create-user-table migration and the create_password_resets_table migration, these two migrations are left alone. Only the create-user-table migration is expanded with a role_id, soft-delete column. 

**Other Migrations:**

To setup a roles with its permissions to view, create, update and/or delete I've added an extra table with actions and a pivot table, permissions, to store the relationship between roles and actions. 

```bash
php artisan make:migration create_actions_table --create=actions
php artisan make:migration create_permissions_table --create=permissions
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
  - Permissions

The commands I used: 

```bash
php artisan make:seeder ActionsTableSeeder
php artisan make:seeder UsersTableSeeder
php artisan make:seeder RolesTableSeeder
php artisan make:seeder CategoriesTableSeeder
php artisan make:seeder PrioritiesTableSeeder
php artisan make:seeder StatusesTableSeeder
php artisan make:seeder ResolutionsTableSeeder
php artisan make:seeder PermissionsTableSeeder
php artisan make:seeder BugsTableSeeder
```

# Middleware
I created a middleware to check if the user may visit the page. This is based on the users role. 

```bash
php artisan make:middleware Authorize
```

In the web-route I added a middleware group. The other routes are standard pages. 

## Install and run

Don't forget to create a database and fill in the correct db-parameters.

```bash
git clone
composer install
cp .env.example .env
php artisan migrate --seed
php artisan serve
```
