<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // change name to first_name
        Schema::table('users', function(Blueprint $table){
            $table->renameColumn('name', 'first_name');
            $table->string('surname');
            $table->timestamp('date_of_birth')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // change name to first_name
        Schema::table('users', function(Blueprint $table){
            $table->renameColumn('fisrt_name', 'name');
            $table->dropColumn('surname');
            $table->dropColumn('date_of_birth');
        });
    }
}
