<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class Teaches extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teaches', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->string('course_code');
            $table->unsignedInteger('semester');
            $table->year('year');
            $table->unsignedInteger('sec_id');
            $table->timestamps();

            $table->index('id'); 
            $table->index('course_code');
            $table->index('semester');
            $table->index('year');
            $table->index('sec_id');
            $table->foreign('id')->references('id')->on('instructors')->onDelete('cascade');
            $table->foreign('course_code')->references('course_code')->on('sections');
            
        });

        // DB::statement('ALTER TABLE teaches ADD FOREIGN KEY (sec_id) REFERENCES sections(sec_id) ON DELETE CASCADE ON UPDATE NO ACTION');
        // DB::statement("ALTER TABLE teaches ADD FOREIGN KEY (semester) REFERENCES sections(semester) ON DELETE CASCADE ON UPDATE NO ACTION");
        // DB::statement("ALTER TABLE teaches ADD FOREIGN KEY (year) REFERENCES sections(year) ON DELETE CASCADE ON UPDATE NO ACTION");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teaches');
    }
}
