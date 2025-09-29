<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Imports\GasavImport;
use Maatwebsite\Excel\Facades\Excel;

class ExcellController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $filePath='Agosto 2025.xlsx';
         if (!Storage::disk('local')->exists($filePath)) {
                echo "No encuentro $filePath";
                //abort(404, 'File not found.',$filePath);
            }
        
        $array = (new GasavImport)->toArray(Storage::disk('local')->path($filePath));        
        
        
        return response()->json($array['PADRON']);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
