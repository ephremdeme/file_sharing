<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->year('year');
            $table->unsignedInteger('semester');
            $table->string('course_code');
            $table->unsignedInteger('sec_id');
            $table->timestamps();
            
            $table->index('id'); 
            $table->index('course_code');
            $table->index('semester');
            $table->index('year');
            $table->index('sec_id');
            $table->foreign('course_code')->references('course_code')->on('courses');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sections');
    }
}
