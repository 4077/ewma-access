<?php namespace ewma\access\ui\userPermissions\controllers\main\permissions;

class App extends \Controller
{
    public function treeQueryBuilder()
    {
        return \ewma\access\models\Permission::orderBy('position');
    }
}
