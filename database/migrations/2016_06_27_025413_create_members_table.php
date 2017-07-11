<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('members', function (Blueprint $table) {
            $table->integer('team_id')->unsigned();
            $table->integer('member_id')->unsigned();

            $table->foreign('team_id')->references('id')->on('teams')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('member_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');

            //$table->primary(['team_id', 'member_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
         Schema::drop('members');
    }
}
