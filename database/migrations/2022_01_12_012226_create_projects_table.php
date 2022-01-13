<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project', function (Blueprint $table) {
            $table->id();
            $table->string('project_name');
            $table->text('project_summary');
            $table->string('token');
            $table->unsignedInteger('user_profile_id');
            $table->unsignedInteger('status_id');
            $table->timestamps();
            $table->foreign('user_profile_id')
                ->references('id')
                ->on('user_profile')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('status_id')
                ->references('id')
                ->on('status')
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
        Schema::dropIfExists('project');
    }
}
