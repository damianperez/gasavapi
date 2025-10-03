<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Imports\GasavImport;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;


class ExcellController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($hoja='todas')
    {
        //
       // return "Procesando $hoja";
       set_time_limit(120);
        $filePath='Agosto 2025.xlsx';
         if (!Storage::disk('local')->exists($filePath)) {
                echo "No encuentro $filePath";
                //abort(404, 'File not found.',$filePath);
            }
        
        $hoja='PADRON';
        $import =  new GasavImport();

       $import->onlySheets('Cuadro tarifario','PADRON','Valores vigentes','Pagos');

       //Excel::import($import, Storage::disk('local')->path($filePath));
       // $import->import($filePath, 'local', \Maatwebsite\Excel\Excel::XLSX);
       $array = $import->onlySheets($hoja)->toArray(Storage::disk('local')->path($filePath));        
      // $array = $import->toArray(Storage::disk('local')->path($filePath));        
        
        
        //return 'OK';
        
        return response()->json($array);
        return response()->json($array['PADRON']);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function spread(Request $request)
    {
        set_time_limit(240);
        $filePath='Agosto 2025.xlsx';
        if (!Storage::disk('local')->exists($filePath)) {
                echo "No encuentro $filePath";
                //abort(404, 'File not found.',$filePath);
        }
        $spreadsheet = IOFactory::load(Storage::disk('local')->path($filePath));
        foreach ($spreadsheet->getAllSheets() as $sheet) {
            foreach ($sheet->getRowIterator() as $row) {
                foreach ($row->getCellIterator() as $cell) {
                    // Get the calculated value of the cell
                    
                
                    //$value = $cell->getCalculatedValue(); 
                    if ($cell->isFormula())
                    $cell->setValue($cell->getCalculatedValue()); // Replace formula with its value
                    // You can then store or process this $value as needed
                    // For example, if you're building a PHP array:
                    // $data[$sheet->getTitle()][$row->getRowIndex()][$cell->getColumn()] = $value;
                }
            }
        }
    $writer = IOFactory::createWriter($spreadsheet, 'Xlsx'); // Or 'Csv', 'Html', etc.
    $writer->save('new_excel_file_with_values.xlsx');

    
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
