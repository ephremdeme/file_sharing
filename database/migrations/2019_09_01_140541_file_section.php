<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FileSection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('file_section');

        Schema::create('file_section', function (Blueprint $table) {
            $table->unsignedBigInteger('file_id');
            $table->string('course_code');
            $table->unsignedInteger('semester');
            $table->year('year');
            $table->unsignedInteger('sec_id');
            $table->timestamps();

            $table->index('course_code');
            $table->index('semester');
            $table->index('year');
            $table->index('sec_id');
            // $table->foreign('course_code')->references('semester')->on('section');

            // $table->foreign('semester')->references('semester')->on('section');
            // $table->foreign('year')->references('year')->on('section');
            // $table->foreign('sec_id')->references('sec_id')->on('section');
            $table->foreign('file_id')->references('id')->on('files');

            // $table->index(['year', 'sec_id', 'semester', 'course_code']);
        });
        // DB::statement('ALTER TABLE file_section ADD CONSTRAINT file_section_sec_id_foreign FOREIGN KEY (sec_id) REFERENCES sections(sec_id) ON DELETE CASCADE ON UPDATE NO ACTION');
        // DB::statement("ALTER TABLE file_section ADD CONSTRAINT file_section_semester_foreign FOREIGN KEY (semester) REFERENCES sections(semester) ON DELETE CASCADE ON UPDATE NO ACTION");
        // DB::statement("ALTER TABLE file_section ADD CONSTRAINT file_section_year_foreign FOREIGN KEY (year) REFERENCES sections(year) ON DELETE CASCADE ON UPDATE NO ACTION");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_section');
    }
}
