<?php

namespace App\Services\V1\Student;

use App\Repositories\V1\Student\StudentRepository;

class StudentService
{
    private $studentRepository;
    
    /**
     * Create a new Repository instance.
     * @return void
     */
    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    /**
     * Return the list of students
     * @return App\Models\V1\Student
     */
    public function index()
    {
        return $this->studentRepository->index();
    }

    /**
     * Update an existing student
     * @return App\Models\V1\Student
     */
    public function update($data)
    {
        return $this->studentRepository->update($data);
    }

    /**
     * Remove an existing student
     * @return App\Models\V1\Student
     */
    public function destroy($data)
    {
        return $this->studentRepository->destroy($data);
    }

    /**
     * Create one new author
     * @return App\Models\V1\Student
     */
    public function store($data)
    {
        return $this->studentRepository->store($data);
    }

    /**
     * Obtains and show one student
     * @return App\Models\V1\Student
     */
    public function show($data)
    {
        return $this->studentRepository->show($data);
    }
}
