<?php

namespace App\Http\Controllers\V1\Student;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Services\V1\Student\StudentService;

class CreateController extends Controller
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
     * Create one new author
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'user_uuid' => 'required|uuid',
            'facility_uuid' => 'required|uuid',
            'specialization_uuid' => 'required|uuid',
            'first_name' => 'required|max:255',
            'second_name' => 'required|max:255',
            'third_name' => 'required|max:255',
            'family_name' => 'required|max:255',
        ];

        $this->validate($request, $rules);

        $data = $request->all();
        $student = $this->studentService->store($data);

        return $this->successResponse($student, Response::HTTP_CREATED);
    }
}
