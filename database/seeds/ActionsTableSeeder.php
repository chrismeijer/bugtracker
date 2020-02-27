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
        $titles = [
            'index' => '',
            'create' => ' toevoegen',
            'show' => ' info',
            'edit' => ' bewerken',
            'destroy' => ' verwijderen',
        ];

        $routesCollection = Route::getRoutes();

        foreach($routesCollection as $route) :
            if($route->getName()!='' && !in_array($route->getName(), ['home','login','logout','register']) && strpos($route->getName(),'password') === false && in_array($route->methods()[0], ['GET','DELETE'])) :
                $routeNameSplit = explode('.', $route->getName());
                $controller = current($routeNameSplit);
                $action = $route->getActionMethod();
                
                DB::table('actions')->insert([
                    'name' => $controller.'_'.$action, 
                    'key' => $controller.'_'.$action,
                    'controller' => $controller,
                    'action' => $action,
                    'title' => ucFirst($controller).$titles[$action]
                ]);
            endif;
        endforeach;
    }
}
