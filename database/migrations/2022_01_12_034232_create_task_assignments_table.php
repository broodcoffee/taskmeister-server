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
            $table->foreignId('user_profile_id')
                ->constrained('user_profile')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignId('task_id')
                ->constrained('task')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamp('created_at');
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
