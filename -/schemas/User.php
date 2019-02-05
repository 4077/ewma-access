<?php namespace ewma\access\schemas;

class User extends \Schema
{
    public $table = 'ewma_access_users';

    public function blueprint()
    {
        return function (\Illuminate\Database\Schema\Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->timestamps();
            $table->boolean('enabled')->default(false);
            $table->string('login', 32)->default('');
            $table->char('phone', 11)->default('');
            $table->string('email')->default('');
            $table->string('pass')->default('');
            $table->enum('status', ['NONE', 'REGISTRATION', 'RESTORING'])->default('NONE');
            $table->string('sent_pass')->nullable();
            $table->dateTime('sent_pass_datetime')->nullable();
            $table->char('token', 32)->default('');
            $table->char('session_key', 32)->default('');
            $table->char('restore_key', 32)->nullable();
            $table->integer('restore_key_time')->nullable(); // todo datetime
        };
    }
}
