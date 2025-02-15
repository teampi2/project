<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use Illuminate\Validation\ValidationException;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class AdministratorController extends Controller
{
    public function validate(Request $request){
        return $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255'
        ]);
    }

    public function create($validated)
    {
        Administrator::create([
            'name' => $validated['name'],
            'email' => $validated['email']
        ]);
    }

    public function store(Request $request)
    {
        try{
            $validated = Administrator::validate($request);
    
            Administrator::create($validated);
    
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
            $user = Administrator::findbyId($request['id']);
            return $user;
        }catch(Exception $e){
            return $e;
        }
    }

    public function edit($validated)
    {
        Administrator::where('id', $validated['id'])->update([
            'name' => $validated['name'],
            'email' => $validated['email']
        ]);
    }

    public function update(Request $request)
    {
        try{
            $validated = Administrator::validate($request);

            Administrator::edit($validated);
        }
        catch(Exception $e){

        }
    }

    public function destroy(Request $request)
    {
        try{
            Administrator::destroy($request['id']);
        }catch(Exception $e){
            return $e;
        }
    }
}
