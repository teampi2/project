<?php

namespace App\Http\Controllers;

use App\Services\CoordinatorService;
use App\Services\VerificationCodeService;
use Illuminate\Validation\ValidationException;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class CoordinatorController extends Controller
{
    protected $coordinatorService, $verificationCodeService;
    
    public function __construct(CoordinatorService $coordinatorService, VerificationCodeService $verificationCodeService)
    {
        $this->coordinatorService = $coordinatorService;
        $this->verificationCodeService = $verificationCodeService;
    }

    public function create(Request $request)
    {
        try{
            $validated = $request->validate([
                'name' => 'required|string|max:2000',
                'email' => 'required|email'
            ]);
            
            $coordinator = $this->coordinatorService->create($validated);
    
            return response()->json([
                'status' => "OK",
                'coordinator' => $coordinator
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
            $coordinators = $this->coordinatorService->all();

            return response()->json([
                'status' => 'OK',
                'coordinators' => $coordinators
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

            $coordinator = $this->coordinatorService->show($validated['id']);

            return response()->json([
                'status' => "OK",
                'coordinator' => $coordinator
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

            $coordinator = $this->coordinatorService->update($validated['id'], $arrayData);

            return response()->json([
                'status' => "OK",
                'coordinator' => $coordinator
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

            $this->coordinatorService->delete($validated['id']);

            return response()->json([
                'status' => 'OK',
                'message' => 'Coordinator apagado com sucesso'
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
