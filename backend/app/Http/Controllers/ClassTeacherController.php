<?php

namespace App\Http\Controllers;

use App\Services\ClassTeacherService;
use Illuminate\Validation\ValidationException;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassTeacherController extends Controller
{
    protected $classTeacherService;
    
    public function __construct(ClassTeacherService $classteacherService)
    {
        $this->classTeacherService = $classteacherService;
    }

    public function create(Request $request)
    {
        try{
            $validated = $request->validate([
                'class_id' => 'required|int',
                'teacher_id' => 'required|int'
            ]);

            $classTeacher = $this->classTeacherService->create($validated);
    
            return response()->json([
                'status' => "OK",
                'classTeacher' => $classTeacher
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
            $classTeachers = $this->classTeacherService->all();

            return response()->json([
                'status' => 'OK',
                'classTeachers' => $classTeachers
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
                'teacher_id' => 'required|int'
            ]);

            $classTeacher = $this->classTeacherService->showByTurmasForUser($validated['teacher_id']);

            return response()->json([
                'status' => "OK",
                'classTeacher' => $classTeacher
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

            $classTeacher = $this->classTeacherService->showByUsersForTurma($validated['class_id']);

            return response()->json([
                'status' => "OK",
                'classTeacher' => $classTeacher
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
                'teacher_id' => 'required|int'
            ]);

            $arrayData = collect($validated)->except('id')->toArray();

            $classTeacher = $this->classTeacherService->update($validated['id'], $arrayData);

            return response()->json([
                'status' => "OK",
                'classTeacher' => $classTeacher
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

            $this->classTeacherService->delete($validated['id']);

            return response()->json([
                'status' => 'OK',
                'message' => 'classTeacher apagado com sucesso'
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
