<?php

namespace App\Http\Controllers;

use App\Services\StudentService;
use App\Services\VerificationCodeService;
use Illuminate\Validation\ValidationException;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $studentService, $verificationCodeService;
    
    public function __construct(StudentService $studentService, VerificationCodeService $verificationCodeService)
    {
        $this->studentService = $studentService;
        $this->verificationCodeService = $verificationCodeService;
    }

    public function create(Request $request)
    {
        try{
            $validated = $request->validate([
                'name' => 'required|string|max:2000',
                'email' => 'required|email'
            ]);
            
            $student = $this->studentService->create($validated);
    
            return response()->json([
                'status' => "OK",
                'student' => $student
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
            $students = $this->studentService->all();

            return response()->json([
                'status' => 'OK',
                'students' => $students
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

    public function show(Request $request)
    {
        try{
            $validated = $request->validate([
                'id' => 'required|int'
            ]);

            $student = $this->studentService->show($validated['id']);

            return response()->json([
                'status' => "OK",
                'student' => $student
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
                'name' => 'string|max:2000',
                'email' => 'required|email',
                'code' => 'required|string|min:6|max:6'
            ]);

            $code = $this->verificationCodeService->verify($validated['email'], $validated['code']);

            if(!$code){
                return response()->json([
                    'status' => "OK",
                    'error' => 'Código Invalido.'
                ], 400);
            }

            $arrayData = collect($validated)->except('id')->toArray();

            $student = $this->studentService->update($validated['id'], $arrayData);

            return response()->json([
                'status' => "OK",
                'student' => $student
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

    public function update_name(Request $request)
    {
        try{
            $validated = $request->validate([
                'id' => 'required|int',
                'name' => 'string|max:2000',
                'email' => 'required|email',
            ]);

            $arrayData = collect($validated)->except('id')->toArray();

            $student = $this->studentService->update($validated['id'], $arrayData);

            return response()->json([
                'status' => "OK",
                'student' => $student
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

            $code = $this->verificationCodeService->verify($validated['email'], $validated['code']);

            if(!$code){
                return response()->json([
                    'status' => "OK",
                    'error' => 'Código Invalido.'
                ], 200);
            }

            $this->studentService->delete($validated['id']);

            return response()->json([
                'status' => 'OK',
                'message' => 'Student apagado com sucesso'
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
