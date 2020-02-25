<?php

use Illuminate\Database\Seeder;

class ActionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('actions')->insert([
            /* USERS */ 
                ['name' => 'users_index', 'title' => 'Gebruikers'],
                ['name' => 'user_create', 'title' => 'Gebruiker toevoegen'],
                ['name' => 'user_view', 'title' => 'Gebruiker info'],
                ['name' => 'user_edit', 'title' => 'Gebruiker bewerken'],
                ['name' => 'user_delete', 'title' => 'Gebruiker verwijderen'],

            /* ROLES */ 
                ['name' => 'roles_index', 'title' => 'Rollen'],
                ['name' => 'role_create', 'title' => 'Rol toevoegen'],
                ['name' => 'role_view', 'title' => 'Rol info'],
                ['name' => 'role_edit', 'title' => 'Rol bewerken'],
                ['name' => 'role_delete', 'title' => 'Rol verwijderen'],

            /* BUGS */ 
                ['name' => 'bugs_index', 'title' => 'Bugs'],
                ['name' => 'bug_create', 'title' => 'Bug toevoegen'],
                ['name' => 'bug_view', 'title' => 'Bug info'],
                ['name' => 'bug_edit', 'title' => 'Bug bewerken'],
                ['name' => 'bug_delete', 'title' => 'Bug verwijderen'],
            
            /* COMMENTS */ 
                ['name' => 'comments_index', 'title' => 'Commentaren'],
                ['name' => 'comment_create', 'title' => 'Commentaar toevoegen'],
                ['name' => 'comment_view', 'title' => 'Commentaar info'],
                ['name' => 'comment_edit', 'title' => 'Commentaar bewerken'],
                ['name' => 'comment_delete', 'title' => 'Commentaar verwijderen'],

            /* CATEGORIES */ 
                ['name' => 'categories_index', 'title' => 'Categorie&uml;n'],
                ['name' => 'category_create', 'title' => 'Categorie toevoegen'],
                ['name' => 'category_view', 'title' => 'Categorie info'],
                ['name' => 'category_edit', 'title' => 'Categorie bewerken'],
                ['name' => 'category_delete', 'title' => 'Categorie verwijderen'],

            /* STATUSES */ 
                ['name' => 'statuses_index', 'title' => 'Statussen'],
                ['name' => 'status_create', 'title' => 'Status toevoegen'],
                ['name' => 'status_view', 'title' => 'Status info'],
                ['name' => 'status_edit', 'title' => 'Status bewerken'],
                ['name' => 'status_delete', 'title' => 'Status verwijderen'],

            /* PRIORITIES */ 
                ['name' => 'priorities_index', 'title' => 'Prioriteiten'],
                ['name' => 'priority_create', 'title' => 'Prioriteit toevoegen'],
                ['name' => 'priority_view', 'title' => 'Prioriteit info'],
                ['name' => 'priority_edit', 'title' => 'Prioriteit bewerken'],
                ['name' => 'priority_delete', 'title' => 'Prioriteit verwijderen'],

            /* RESOLUTIONS */ 
                ['name' => 'resolutions_index', 'title' => 'Resoluties'],
                ['name' => 'resolution_create', 'title' => 'Resolutie toevoegen'],
                ['name' => 'resolution_view', 'title' => 'Resolutie info'],
                ['name' => 'resolution_edit', 'title' => 'Resolutie bewerken'],
                ['name' => 'resolution_delete', 'title' => 'Resolutie verwijderen'],

            /* ATTACHMENTS */ 
                ['name' => 'attachments_index', 'title' => 'Bijlagen'],
                ['name' => 'attachment_create', 'title' => 'Bijlage toevoegen'],
                ['name' => 'attachment_view', 'title' => 'Bijlage info'],
                ['name' => 'attachment_edit', 'title' => 'Bijlage bewerken'],
                ['name' => 'attachment_delete', 'title' => 'Bijlage verwijderen']
        ]);
    }
}
