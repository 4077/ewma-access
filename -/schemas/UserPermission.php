<?php namespace ewma\access\schemas;

class UserPermission extends \Schema
{
    public $table = 'ewma_access_users_permissions';

    public function blueprint()
    {
        return function (\Illuminate\Database\Schema\Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('user_id')->default(0);
            $table->integer('permission_id')->default(0);
            $table->enum('mode', ['MERGE', 'DIFF'])->default('MERGE');
        };
    }
}
