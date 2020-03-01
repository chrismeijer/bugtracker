<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ADMINISTRATOR 
            for($counterAction = 1; $counterAction <= 45; $counterAction++) :
                DB::table('permissions')->insert([
                    ['role_id' => 1, 'action_id' => $counterAction]
                ]);
            endfor;
        // EMPLOYEE
            $employeeActionsArray = [
                ['controller' => 'bugs', 'action' => 'index'],
                ['controller' => 'bugs', 'action' => 'create'],
                ['controller' => 'bugs', 'action' => 'show'],
                ['controller' => 'bugs', 'action' => 'edit'],
                ['controller' => 'bugs', 'action' => 'destroy'],
                ['controller' => 'users', 'action' => 'index'],
                ['controller' => 'users', 'action' => 'create'],
                ['controller' => 'users', 'action' => 'show'],
                ['controller' => 'users', 'action' => 'edit'],
                ['controller' => 'users', 'action' => 'destroy'],
                ['controller' => 'comments', 'action' => 'index'],
                ['controller' => 'comments', 'action' => 'create'],
                ['controller' => 'comments', 'action' => 'show'],
                ['controller' => 'comments', 'action' => 'edit'],
                ['controller' => 'comments', 'action' => 'destroy'],
                ['controller' => 'attachments', 'action' => 'index'],
                ['controller' => 'attachments', 'action' => 'create'],
                ['controller' => 'attachments', 'action' => 'show'],
                ['controller' => 'attachments', 'action' => 'edit'],
                ['controller' => 'attachments', 'action' => 'destroy']
            ];
            foreach($employeeActionsArray as $action) :
                $actionId = DB::table('actions')
                    ->where('controller', $action['controller'])
                    ->where('action', $action['action'])
                    ->value('id');

                DB::table('permissions')->insert([
                    ['role_id' => 2, 'action_id' => $actionId]
                ]);
            endforeach;
        // CUSTOMER
            $customerActionsArray = [
                ['controller' => 'bugs', 'action' => 'index'],
                ['controller' => 'bugs', 'action' => 'create'],
                ['controller' => 'bugs', 'action' => 'show'],
                ['controller' => 'bugs', 'action' => 'edit'],
                ['controller' => 'bugs', 'action' => 'destroy'],
                ['controller' => 'comments', 'action' => 'index'],
                ['controller' => 'comments', 'action' => 'create'],
                ['controller' => 'comments', 'action' => 'show'],
                ['controller' => 'comments', 'action' => 'edit'],
                ['controller' => 'comments', 'action' => 'destroy'],
                ['controller' => 'attachments', 'action' => 'index'],
                ['controller' => 'attachments', 'action' => 'create'],
                ['controller' => 'attachments', 'action' => 'show'],
                ['controller' => 'attachments', 'action' => 'edit'],
                ['controller' => 'attachments', 'action' => 'destroy']
            ];
            foreach($customerActionsArray as $action) :
                $actionId = DB::table('actions')
                    ->where('controller', $action['controller'])
                    ->where('action', $action['action'])
                    ->value('id');

                DB::table('permissions')->insert([
                    ['role_id' => 3, 'action_id' => $actionId]
                ]);
            endforeach;
    }
}
