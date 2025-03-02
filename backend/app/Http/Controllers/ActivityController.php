<?php

namespace App\Http\Controllers;

use App\Services\ActivityService;
use Illuminate\Validation\ValidationException;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    protected $activityService;
    
    public function __construct(ActivityService $activityService)
    {
        $this->activityService = $activityService;
    }

    public function create(Request $request)
    {
        try{
            $user = Auth::user();
            $id = $user['id'];

            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string|max:500',
                'file' => 'file|mimes:png,jpg,zip,rar|max:10240',
                'due_date' => 'required|date|after_or_equal:today',
                'class_id' => 'required|int'
            ]);

            $arrayData = array_merge($validated, ['account_id' => $id]);
            
            $activity = $this->activityService->create($arrayData);
    
            return response()->json([
                'status' => "OK",
                'activity' => $activity
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
            $activitys = $this->activityService->all();

            return response()->json([
                'status' => 'OK',
                'activitys' => $activitys
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

            $activity = $this->activityService->show($validated['id']);

            return response()->json([
                'status' => "OK",
                'activity' => $activity
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

    public function showByTurma(Request $request)
    {
        try{
            $validated = $request->validate([
                'class_id' => 'required|int'
            ]);

            $activity = $this->activityService->showByTurma($validated['class_id']);

            return response()->json([
                'status' => "OK",
                'activities' => $activity
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
            $user = Auth::user();
            $id = $user['id'];

            $validated = $request->validate([
                'id' => 'required|int',
                'name' => 'required|string|max:2000',
                'shift' => 'required|string|in:MORNING,AFTERNOON,EVENING,NIGHT',
                'academic_year' => 'required',
                'school_id' => 'required|int'
            ]);

            $arrayDataFull = array_merge($validated, ['account_id' => $id]);
            $arrayDataExcept = collect($arrayDataFull)->except('id')->toArray();

            $activity = $this->activityService->update($validated['id'], $arrayDataExcept);

            return response()->json([
                'status' => "OK",
                'activity' => $activity
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

            $this->activityService->delete($validated['id']);

            return response()->json([
                'status' => 'OK',
                'message' => 'Activity apagado com sucesso'
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
