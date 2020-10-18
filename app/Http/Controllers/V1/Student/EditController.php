<?php

namespace App\Http\Controllers\V1\Student;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Services\V1\Student\StudentService;

class EditController extends Controller
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
     * Update an existing student
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $student_uuid)
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
        $data['student_uuid'] = $student_uuid;

        $student = $this->studentService->update($data);

        if ($student->isClean()) {
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return $this->successResponse($student);
    }

    /**
     * Remove an existing student
     * @return Illuminate\Http\Response
     */
    public function destroy($student_uuid)
    {
        $data['student_uuid'] = $student_uuid;

        $student = $this->studentService->destroy($data);

        return $this->successResponse($student);
    }
}
