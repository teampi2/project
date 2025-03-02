<?php

namespace App\Http\Controllers;

use App\Services\ClassStudentService;
use Illuminate\Validation\ValidationException;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassStudentController extends Controller
{
    protected $classStudentService;
    
    public function __construct(ClassStudentService $classstudentService)
    {
        $this->classStudentService = $classstudentService;
    }

    public function create(Request $request)
    {
        try{
            $validated = $request->validate([
                'class_id' => 'required|int',
                'student_id' => 'required|int'
            ]);

            $classStudent = $this->classStudentService->create($validated);
    
            return response()->json([
                'status' => "OK",
                'classStudent' => $classStudent
            ], 200);
        }
        catch (ValidationException $e) {
            return response()->json([
                'message' => 'Data Invalid',
                'errors' => $e->errors(),
            ], 422);
        }
        catch (QueryException $e) {
            return response()->json([
                'message' => 'Database error.',
                'error' => $e->getMessage(),
            ], 500);
        }
        catch(Exception $e){
            return response()->json([
                'error' => $e
            ], 400);
        }
        
    }

    public function all(Request $request)
    {
        try {
            $classStudents = $this->classStudentService->all();

            return response()->json([
                'status' => 'OK',
                'classStudents' => $classStudents
            ], 200);
        }
        catch (ValidationException $e) {
            return response()->json([
                'message' => 'Data Invalid',
                'errors' => $e->errors(),
            ], 422);
        }
        catch (QueryException $e) {
            return response()->json([
                'message' => 'Database error.',
                'error' => $e->getMessage(),
            ], 500);
        }
        catch(Exception $e){
            return response()->json([
                'error' => $e
            ], 400);
        }
    }

    public function showByTurmasForUser(Request $request)
    {
        try{
            $validated = $request->validate([
                'student_id' => 'required|int'
            ]);

            $classStudent = $this->classStudentService->showByTurmasForUser($validated['student_id']);

            return response()->json([
                'status' => "OK",
                'classStudent' => $classStudent
            ], 200);
        }
        catch (ValidationException $e) {
            return response()->json([
                'message' => 'Data Invalid',
                'errors' => $e->errors(),
            ], 422);
        }
        catch (QueryException $e) {
            return response()->json([
                'message' => 'Database error.',
                'error' => $e->getMessage(),
            ], 500);
        }
        catch(Exception $e){
            return response()->json([
                'error' => $e
            ], 400);
        }
    }

    public function showByUsersForTurma(Request $request)
    {
        try{
            $validated = $request->validate([
                'class_id' => 'required|int'
            ]);

            $classStudent = $this->classStudentService->showByUsersForTurma($validated['class_id']);

            return response()->json([
                'status' => "OK",
                'classStudent' => $classStudent
            ], 200);
        }
        catch (ValidationException $e) {
            return response()->json([
                'message' => 'Data Invalid',
                'errors' => $e->errors(),
            ], 422);
        }
        catch (QueryException $e) {
            return response()->json([
                'message' => 'Database error.',
                'error' => $e->getMessage(),
            ], 500);
        }
        catch(Exception $e){
            return response()->json([
                'error' => $e
            ], 400);
        }
    }

    public function update(Request $request)
    {
        try{
            $validated = $request->validate([
                'id' => 'required|int',
                'class_id' => 'required|int',
                'student_id' => 'required|int'
            ]);

            $arrayData = collect($validated)->except('id')->toArray();

            $classStudent = $this->classStudentService->update($validated['id'], $arrayData);

            return response()->json([
                'status' => "OK",
                'classStudent' => $classStudent
            ], 200);
        }
        catch (ValidationException $e) {
            return response()->json([
                'message' => 'Data Invalid',
                'errorsV' => $e->errors(),
            ], 422);
        }
        catch (QueryException $e) {
            return response()->json([
                'message' => 'Database error.',
                'errorQ' => $e,
            ], 500);
        }
        catch(Exception $e){
            return response()->json([
                'errorG' => $e->getMessage()
            ], 400);
        }
    }

    public function destroy(Request $request)
    {
        try{
            $validated = $request->validate([
                'id' => 'require|int'
            ]);

            $this->classStudentService->delete($validated['id']);

            return response()->json([
                'status' => 'OK',
                'message' => 'classStudent apagado com sucesso'
            ], 200);
        }
        catch (ValidationException $e) {
            return response()->json([
                'message' => 'Data Invalid',
                'errors' => $e->errors(),
            ], 422);
        }
        catch (QueryException $e) {
            return response()->json([
                'message' => 'Database error.',
                'error' => $e->getMessage(),
            ], 500);
        }
        catch(Exception $e){
            return response()->json([
                'error' => $e
            ], 400);
        }
    }
}
