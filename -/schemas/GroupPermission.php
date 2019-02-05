<?php namespace ewma\access\schemas;

class GroupPermission extends \Schema
{
    public $table = 'ewma_access_groups_permissions';

    public function blueprint()
    {
        return function (\Illuminate\Database\Schema\Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('group_id');
            $table->integer('permission_id');
        };
    }
}
