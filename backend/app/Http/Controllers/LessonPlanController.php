<?php

namespace App\Http\Controllers;

use App\Services\LessonPlanService;
use Illuminate\Validation\ValidationException;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessonPlanController extends Controller
{
    protected $lessonplanService;
    
    public function __construct(LessonPlanService $lessonplanService)
    {
        $this->lessonplanService = $lessonplanService;
    }

    public function create(Request $request)
    {
        try{
            $validated = $request->validate([
                'title' => 'required|string|max:100',
                'description' => 'required|string|max:1500',
                'objectives' => 'required|string|max:1000',
                'materials' => 'string|max:1000',
                'file' => 'file|mimes:zip,rar,pdf'
            ]);
            
            $user = Auth::user();

            $arrayData = array_merge($validated, ['account_id' => $user->id]);

            $lessonplan = $this->lessonplanService->create($arrayData);
    
            return response()->json([
                'status' => "OK",
                'lessonplan' => $lessonplan
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
            $lessonplans = $this->lessonplanService->all();

            return response()->json([
                'status' => 'OK',
                'lessonplans' => $lessonplans
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

            $lessonplan = $this->lessonplanService->show($validated['id']);

            return response()->json([
                'status' => "OK",
                'lessonplan' => $lessonplan
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
                'objectives' => 'required|string|max:1000',
                'materials' => 'string|max:1000',
                'file' => 'file|mimes:zip,rar,pdf'
            ]);

            $user = Auth::user();

            $arrayData = array_merge($validated, ['account_id' => $user->id]);
            $arrayDataExc = collect($arrayData)->except('id')->toArray();

            $lessonplan = $this->lessonplanService->update($validated['id'], $arrayDataExc);

            return response()->json([
                'status' => "OK",
                'lessonplan' => $lessonplan
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

            $this->lessonplanService->delete($validated['id']);

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
