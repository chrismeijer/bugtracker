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
                    ['action_id' => $counterAction, 'role_id' => 1]
                ]);
            endfor;
        // EMPLOYEE
            $employeeActionsArray = [1,3,6,7,8,9,10,11,13,16,17,18,19,20,21,22,23,24,25,26,28,31,33,36,38,41,42,43,44,45];
            foreach($employeeActionsArray as $action_id) :
                DB::table('permissions')->insert([
                    ['action_id' => $action_id, 'role_id' => 2]
                ]);
            endforeach;
        // CUSTOMER
            $customerActionsArray = [6,7,8,9,10,19,21,22,23,24,25,41,42,43,44,45];
            foreach($customerActionsArray as $action_id) :
                DB::table('permissions')->insert([
                    ['action_id' => $action_id, 'role_id' => 3]
                ]);
            endforeach;
    }
}
