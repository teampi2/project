<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\VerificationCode;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AccountController extends Controller
{
    public function index()
    {
        //
    }

    public function create($validated)
    {
        if($validated->file('image')){
            $image = $validated->file('image');
            $path = $image->store('images', 'public');

            Account::create([
                'email' => $validated['email'],
                'password' => bcrypt($validated['password']),
                'image' => $path,
                'role' => $validated['role']
            ]);
        }else{
            Account::create([
                'email' => $validated['email'],
                'password' => bcrypt($validated['password']),
                'role' => $validated['role']
            ]);
        }
    }

    public function validate(Request $request)
    {
        return $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|max:255|min:8|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*?&.#]/',
            'image' => 'mimes:jpg,jpeg,png,gif|image|max:2048',
            'status' => 'in:ACTIVE,INACTIVE',
            'role' => 'required|in:ADMINISTRATOR,COORDINATOR,MONITOR,STUDENT',
            'code' => 'required|string|size:6',
        ]);
    }

    public function store(Request $request)
    {
        try{
            $validated = Account::validate($request);

            $code = VerificationCode::buscar($validated['email'], $validated['code']);
            
            if($code['code'] == $validated['code'] && $code['expires_at']>=now()){
                Account::create($validated);
            }else{
                $code->delete();
                return response()->json([
                    'error' => "Código Invalido",
                ], 400);
            }

            $code->delete();
            return response()->json([
                'status' => "OK"
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
            $user = Account::findbyId($request['id']);
            return $user;
        }catch(Exception $e){
            return $e;
        }
    }

    public function edit($data)
    {
        if($data->file('image')){
            $image = $data->file('image');
            $path = $image->store('images', 'public');

            Account::where('id', $data['id'])->update([
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'image' => $path,
                'status' => $data['status'],
            ]);
        }else{
            Account::where('id', $data['id'])->update([
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'status' => $data['status'],
            ]);
        }
    }

    public function update(Request $request)
    {
        try{
            $validated = Account::validate($request);

            if($request->file('image')){
                //apagar imagem antiga...
                $Account = Account::where('id', $request['id']);
                $Account->edit($validated);
            }else{
                $Account = Account::where('id', $request['id']);
                $Account->edit($validated);
            }

            return response()->json([
                'status' => "OK"
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
            Account::destroy($request['id']);
        }catch(Exception $e){
            return $e;
        }
    }
}
