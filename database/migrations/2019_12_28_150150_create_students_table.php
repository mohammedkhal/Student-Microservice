<?php

use App\Models\V1\Student;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_students', function (Blueprint $table) {
            $table->bigIncrements('sequence');
            $table->uuid('uuid');
            $table->uuid('user_uuid');
            $table->uuid('facility_uuid');
            $table->uuid('specialization_uuid');
            $table->string('first_name');
            $table->string('second_name');
            $table->string('third_name');
            $table->string('family_name');
            $table->year('year_of_study');
            $table->string('status')->default(Student::STATUS_ACTIVE);
            $table->boolean('is_graduate')->default(false);

            $table->timestamps();

            $table->unique('uuid');
			$table->index('status');
			$table->index('user_uuid');
			$table->index('facility_uuid');
			$table->index('specialization_uuid');
			$table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
