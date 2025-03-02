<?php

namespace App\Http\Controllers;

use App\Services\ActivityService;
use App\Services\StudentActivityService;
use Illuminate\Validation\ValidationException;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentActivityController extends Controller
{
    protected $StudentActivityService, $ActivityService;
    
    public function __construct(StudentActivityService $StudentActivityService, ActivityService $ActivityService)
    {
        $this->StudentActivityService = $StudentActivityService;
        $this->ActivityService = $ActivityService;
    }

    public function create(Request $request)
    {
        try{
            $validated = $request->validate([
                'file' => 'file|mimes:png,jpg,zip,rar|max:10240',
                'submission_date' => 'required|date|after_or_equal:today',
                'activity_id' => 'required|int'
            ]);

            $actiivity = $this->ActivityService->show($validated['activity_id']);

            if($validated['submission_date'] < $actiivity['due_date']){
                return response()->json([
                    'status' => 'OK',
                    'message' => 'The delivery deadline is over.'
                ], 400);
            }

            $user = Auth::user();
            $id = $user['id'];

            $arrayData = array_merge($validated, ['student_id' => $id]);
            
            $StudentActivity = $this->StudentActivityService->create($arrayData);
    
            return response()->json([
                'status' => "OK",
                'StudentActivity' => $StudentActivity
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
            $validated = $request->validate([
                'activity_id' => 'required|int'
            ]);

            $StudentActivitys = $this->StudentActivityService->all($validated['activity_id']);

            return response()->json([
                'status' => 'OK',
                'StudentActivitys' => $StudentActivitys
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
                'activity_id' => 'required|int',
                'student_id' => 'required|int'
            ]);

            $StudentActivity = $this->StudentActivityService->show($validated['activity_id'], $validated['student_id']);

            return response()->json([
                'status' => "OK",
                'StudentActivity' => $StudentActivity
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
                'score' => 'required|float'
            ]);

            $arrayData = collect($validated)->except('id')->toArray();

            $StudentActivity = $this->StudentActivityService->update($validated['id'], $arrayData);

            return response()->json([
                'status' => "OK",
                'StudentActivity' => $StudentActivity
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

            $this->StudentActivityService->delete($validated['id']);

            return response()->json([
                'status' => 'OK',
                'message' => 'StudentActivity apagado com sucesso'
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
