<?php namespace ewma\access\schemas;

class UserGroup extends \Schema
{
    public $table = 'ewma_access_users_groups';

    public function blueprint()
    {
        return function (\Illuminate\Database\Schema\Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('user_id')->default(0);
            $table->integer('group_id')->default(0);
        };
    }
}
