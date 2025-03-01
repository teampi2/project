<?php

namespace App\Http\Controllers;

use App\Services\AccountService;
use App\Services\VerificationCodeService;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AccountController extends Controller
{
    protected $accountService, $verificationCodeService;

    public function __construct(AccountService $accountService, VerificationCodeService $verificationCodeService)
    {
        $this->accountService = $accountService;
        $this->verificationCodeService = $verificationCodeService;
    }

    public function create(Request $request)
    {
        try {
            $validated = $request->validate([
                'email' => 'required|string|email|max:255',
                'password' => 'required|string|max:255|min:8|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*?&.#]/',
                'file' => 'nullable|file|mimes:jpeg,png,pdf',
                'status' => 'in:ACTIVE,INACTIVE',
                'role' => 'required|in:ADMINISTRATOR,COORDINATOR,MONITOR,STUDENT',
                'code' => 'required|string|size:6',
            ]);

            $code = $this->verificationCodeService->verify($validated['email'], $validated['code']);

            if(!$code){
                return response()->json([
                    'status' => "OK",
                    'error' => 'Código Invalido.'
                ], 400);
            }

            $account = $this->accountService->create($validated);

            return response()->json([
                'status' => "OK",
                'account' => $account
            ]);
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
            $accounts = $this->accountService->all();

            return response()->json([
                'status' => 'OK',
                'admins' => $accounts
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

            $account = $this->accountService->show($validated['id']);

            return response()->json([
                'status' => "OK",
                'account' => $account
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
                'email' => 'required|string|email|max:255',
                'password' => 'string|max:255|min:8|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*?&.#]/',
                'file' => 'nullable|file|mimes:jpeg,png,pdf|max:5120',
                'status' => 'in:ACTIVE,INACTIVE',
                'role' => 'in:ADMINISTRATOR,COORDINATOR,MONITOR,STUDENT',
                'code' => 'required|string|size:6',
            ]);

            $code = $this->verificationCodeService->verify($validated['email'], $validated['code']);

            if(!$code){
                return response()->json([
                    'status' => "OK",
                    'error' => 'Código Invalido.'
                ], 400);
            }

            $arrayData = collect($validated)->except('id')->toArray();

            $account = $this->accountService->update($validated['id'], $arrayData);

            return response()->json([
                'status' => "OK",
                'account' => $account
            ], 200);

        }catch (ValidationException $e) {
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

    public function destroy(Request $request)
    {
        try{
            $validated = $request->validate([
                'id' => 'required|int',
                'code' => 'required|string|size:6',
            ]);

            $code = $this->verificationCodeService->verify($validated['email'], $validated['code']);

            if(!$code){
                return response()->json([
                    'status' => "OK",
                    'error' => 'Código Invalido.'
                ], 400);
            }

            $arrayData = [ 'status' => 'INACTIVE'];

            $account = $this->accountService->update($validated['id'], $arrayData);

            return response()->json([
                'status' => "OK",
                'account' => $account
            ], 200);

        }catch (ValidationException $e) {
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
