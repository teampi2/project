<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use Exception;
use Illuminate\Http\Request;

class AdministratorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        try{
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255'
            ]);
    
            $adm = Administrator::create([
                'name' => $validated['name'],
                'email' => $validated['email']
            ]);
    
            return response()->json([
                'status' => "OK"
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'error' => $e
            ], 400);
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
