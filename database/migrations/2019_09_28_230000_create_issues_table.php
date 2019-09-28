<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table
                ->bigInteger('project_id')
                ->nullable(false);
            $table
                ->bigInteger('author_id')
                ->nullable(false);
            $table
                ->bigInteger('assigned_to_id')
                ->nullable();
            $table
                ->string('subject')
                ->default('')
                ->nullable(false);
            $table
                ->text('description')
                ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('issues');
    }
}
