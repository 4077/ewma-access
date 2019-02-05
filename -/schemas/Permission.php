<?php namespace ewma\access\schemas;

class Permission extends \Schema
{
    public $table = 'ewma_access_permissions';

    public function blueprint()
    {
        return function (\Illuminate\Database\Schema\Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('parent_id')->default(0);
            $table->integer('position')->default(0);
            $table->string('module_namespace')->default('');
            $table->string('path_segment')->default('');
            $table->string('path')->default('');
            $table->string('name')->default('');
        };
    }
}
