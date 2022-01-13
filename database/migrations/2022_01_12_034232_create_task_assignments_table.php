<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_assignment', function (Blueprint $table) {
            $table->integer('user_profile_id')->unsigned();
            $table->integer('task_id')->unsigned();
            $table->foreign('user_profile_id')
                ->references('id')
                ->on('user_profile')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('task_id')
                ->references('id')
                ->on('task')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_assignment');
    }
}
