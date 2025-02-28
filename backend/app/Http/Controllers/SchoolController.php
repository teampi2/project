<?php

namespace App\Http\Controllers;

use App\Services\SchoolService;
use App\Services\VerificationCodeService;
use Illuminate\Validation\ValidationException;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    protected $schoolService;
    
    public function __construct(SchoolService $schoolService)
    {
        $this->schoolService = $schoolService;
    }

    public function create(Request $request)
    {
        try{
            $validated = $request->validate([
                'name' => 'required|string|max:500',
		        'cnpj'  => 'required|regex:/^\d{2}\.\d{3}\.\d{3}\/\d{4}-\d{2}$/',
		        'address'  => 'required|string|max:1000',
		        'email'  => 'required|email',
		        'phone'  => 'required|string|regex:/^\(?\d{2}\)?\s?(?:9\d{4}|\d{4})-?\d{4}$/',
		        'file'  => 'file|mimes:jpeg,png,pdf|max:5120'
            ]);
            
            $school = $this->schoolService->create($validated);
    
            return response()->json([
                'status' => "OK",
                'school' => $school
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
            $schools = $this->schoolService->all();

            return response()->json([
                'status' => 'OK',
                'schools' => $schools
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

            $school = $this->schoolService->show($validated['id']);

            return response()->json([
                'status' => "OK",
                'school' => $school
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
                'name' => 'required|string|max:500',
		        'cnpj'  => 'required|regex:/^\d{2}\.\d{3}\.\d{3}\/\d{4}-\d{2}$/',
		        'address'  => 'required|string|max:1000',
		        'email'  => 'required|email',
		        'phone'  => 'required|string|regex:/^\(?\d{2}\)?\s?(?:9\d{4}|\d{4})-?\d{4}$/',
		        'file'  => 'file|mimes:jpeg,png,pdf|max:5120'
            ]);

            $arrayData = collect($validated)->except('id')->toArray();

            $school = $this->schoolService->update($validated['id'], $arrayData);

            return response()->json([
                'status' => "OK",
                'school' => $school
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

            $this->schoolService->delete($validated['id']);

            return response()->json([
                'status' => 'OK',
                'message' => 'School apagado com sucesso'
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
