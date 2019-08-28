<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Files extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->string('name');
            $table->string('path', 255);
            $table->string('type')->nullable();
            $table->string('size')->nullable();
            $table->string('description')->nullable();
            $table->string('course_code')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('instructor_id')->nullable();

            $table->foreign('instructor_id')->references('id')->on('instructors');
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
        Schema::dropIfExists('files');
    }
}
