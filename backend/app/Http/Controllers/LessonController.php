<?php

namespace App\Http\Controllers;

use App\Services\LessonService;
use Illuminate\Validation\ValidationException;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
    protected $lessonService;
    
    public function __construct(LessonService $lessonService)
    {
        $this->lessonService = $lessonService;
    }

    public function create(Request $request)
    {
        try{
            $validated = $request->validate([
                'title' => 'required|string|max:100',
                'description' => 'required|string|max:1500',
                'file' => 'file|mimes:zip,rar,pdf',
                'date' => 'required|string',
                'lesson_plan_id' => 'required|int',
                'class_id' => 'required|int'
            ]);
            
            $user = Auth::user();

            $arrayData = array_merge($validated, ['account_id' => $user->id]);

            $lesson = $this->lessonService->create($arrayData);
    
            return response()->json([
                'status' => "OK",
                'lessonplan' => $lesson
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
            $lessons = $this->lessonService->all();

            return response()->json([
                'status' => 'OK',
                'lessonplans' => $lessons
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

            $lesson = $this->lessonService->show($validated['id']);

            return response()->json([
                'status' => "OK",
                'lessonplan' => $lesson
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
                'title' => 'required|string|max:100',
                'description' => 'required|string|max:1500',
                'file' => 'file|mimes:zip,rar,pdf',
                'date' => 'required|string',
                'lesson_plan_id' => 'required|int',
                'class_id' => 'required|int'
            ]);

            $user = Auth::user();

            $arrayData = array_merge($validated, ['account_id' => $user->id]);
            $arrayDataExc = collect($arrayData)->except('id')->toArray();

            $lesson = $this->lessonService->update($validated['id'], $arrayDataExc);

            return response()->json([
                'status' => "OK",
                'lessonplan' => $lesson
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

            $this->lessonService->delete($validated['id']);

            return response()->json([
                'status' => 'OK',
                'message' => 'LessonPlan apagado com sucesso'
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
