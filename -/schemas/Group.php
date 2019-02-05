<?php namespace ewma\access\schemas;

class Group extends \Schema
{
    public $table = 'ewma_access_groups';

    public function blueprint()
    {
        return function (\Illuminate\Database\Schema\Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('position');
            $table->boolean('system')->default(false);
            $table->enum('system_type', ['GUESTS', 'REGISTERED'])->nullable();
            $table->string('name')->default('');
        };
    }
}
