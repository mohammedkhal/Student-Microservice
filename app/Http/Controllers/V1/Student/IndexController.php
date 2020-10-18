<?php

namespace App\Http\Controllers\V1\Student;

use App\Traits\ApiResponser;
use App\Http\Controllers\Controller;
use App\Services\V1\Student\StudentService;

class IndexController extends Controller
{
    use ApiResponser;
    private $studentService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    /**
     * Return the list of students
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        $students = $this->studentService->index();

        return $this->successResponse($students);
    }

    /**
     * Obtains and show one student
     * @return Illuminate\Http\Response
     */
    public function show($student_uuid)
    {
        $data['student_uuid'] = $student_uuid;
        $student = $this->studentService->show($data);

        return $this->successResponse($student);
    }
}
