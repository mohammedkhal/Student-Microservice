<?php

namespace App\Repositories\V1\Student;

use App\Models\V1\Student;
use App\Repositories\Repository;

class StudentRepository extends Repository
{
    /**
     * Create a new Student instance.
     * @return object
     */
    public function getModel()
    {
        return new Student;
    }

    /**
     * Return the list of students
     * @return App\Models\V1\Student
     */
    public function index()
    {
        $students = $this->getModel();

        $students = $students->whereStatus(Student::STATUS_ACTIVE)->get();

        return $students;
    }

    /**
     * Update an existing student
     * @return App\Models\V1\Student
     */
    public function update($data)
    {
        $student = $this->getModel();

        $student = $student->findOrFail($data['student_uuid'])->first();

        $student->facility_uuid = $data['facility_uuid'];
        $student->specialization_uuid = $data['specialization_uuid'];
        $student->first_name = $data['first_name'];
        $student->second_name = $data['second_name'];
        $student->third_name = $data['third_name'];
        $student->family_name = $data['family_name'];

        $student->save();

        return $student;
    }

    /**
     * Remove an existing student
     * @return App\Models\V1\Student
     */
    public function destroy($data)
    {
        $student = $this->getModel();

        $student = $student->findOrFail($data['student_uuid'])->first();
        $student->status = Student::STATUS_INACTIVE;

        $student->save();

        return $student;
    }

    /**
     * Create one new student
     * @return App\Models\V1\Student
     */
    public function store($data)
    {
        $student = $this->getModel();

        $student->user_uuid = $data['user_uuid'];
        $student->facility_uuid = $data['facility_uuid'];
        $student->specialization_uuid = $data['specialization_uuid'];
        $student->first_name = $data['first_name'];
        $student->second_name = $data['second_name'];
        $student->third_name = $data['third_name'];
        $student->family_name = $data['family_name'];
        $student->year_of_study = $data['year_of_study'];

        $student->save();

        return $student;
    }

    /**
     * Obtains and show one student
     * @return App\Models\V1\Student
     */
    public function show($data)
    {
        $student = $this->getModel();

        $student = $student->findOrFail($data['student_uuid'])->first();

        return $student;
    }
}
