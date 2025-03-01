<?php

namespace App\Http\Controllers;

use App\Services\ClassesService;
use Illuminate\Validation\ValidationException;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassesController extends Controller
{
    protected $classesService;
    
    public function __construct(ClassesService $classesService)
    {
        $this->classesService = $classesService;
    }

    public function create(Request $request)
    {
        try{
            $user = Auth::user();
            $id = $user['id'];

            $validated = $request->validate([
                'name' => 'required|string|max:2000',
                'shift' => 'required|string|in:MORNING,AFTERNOON,EVENING,NIGHT',
                'academic_year' => 'required',
                'school_id' => 'required|int'
            ]);

            $arrayData = array_merge($validated, ['account_id' => $id]);
            
            $classes = $this->classesService->create($arrayData);
    
            return response()->json([
                'status' => "OK",
                'classes' => $classes
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
            $classess = $this->classesService->all();

            return response()->json([
                'status' => 'OK',
                'classess' => $classess
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

            $classes = $this->classesService->show($validated['id']);

            return response()->json([
                'status' => "OK",
                'classes' => $classes
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

            $classes = $this->classesService->update($validated['id'], $arrayDataExcept);

            return response()->json([
                'status' => "OK",
                'classes' => $classes
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

            $this->classesService->delete($validated['id']);

            return response()->json([
                'status' => 'OK',
                'message' => 'Classes apagado com sucesso'
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
