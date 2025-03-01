<?php

namespace App\Http\Controllers;

use App\Mail\CodeMail;
use App\Models\Administrator;
use App\Models\Coordinator;
use App\Models\Monitor;
use App\Models\Student;
use App\Models\VerificationCode;
use App\Services\VerificationCodeService;
use Illuminate\Validation\ValidationException;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class VerificationCodeController extends Controller
{
    protected $verificationCodeService;

    public function __construct(VerificationCodeService $verificationCodeService)
    {
        $this->verificationCodeService = $verificationCodeService;
    }

    public function create(Request $request)
    {
        try{
            $validated = $request->validate(['email' => 'required|email']);

            $code = $this->verificationCodeService->create($validated['email']);

            return response()->json([
                'status' => 'OK',
                'message' => 'Código Enviado'
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
}
