<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\Importable;

use Maatwebsite\Excel\Concerns\HasReferencesToOtherSheets;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

use Illuminate\Contracts\Queue\ShouldQueue;

class GasavImport implements  WithMultipleSheets ,ToCollection, WithBatchInserts, WithChunkReading, ShouldQueue
{
    use Importable; // Use the trait

    
    public function collection(Collection $collection)
    {
        //
    }
    public function sheets(): array
    {
        return [
             0 => new FirstSheetImport(),
            'Cuadro tarifario'=> new FirstSheetImport(),
            'Valores vigentes'=> new FirstSheetImport(),
            'Pagos' => new FirstSheetImport(),
            'PADRON' => new FirstSheetImport(),            
            'VELEROS' => new FirstSheetImport(),
            'SECUESTRADOS' => new FirstSheetImport(),
        ];
    }
     public function onUnknownSheet($sheetName)
    {
        // E.g. you can log that a sheet was not found.
        info("Sheet {$sheetName} was skipped");
    }
    public function conditionalSheets(): array
    {
        return [
            'Worksheet 1' => new FirstSheetImport(),
            'Worksheet 2' => new SecondSheetImport(),
            'Worksheet 3' => new ThirdSheetImport(),
        ];
    }
    public function batchSize(): int
    {
        return 1000;
    }
    public function chunkSize(): int
    {
        return 1000;
    }
}
class FirstSheetImport implements ToArray, ToCollection , HasReferencesToOtherSheets //, WithCalculatedFormulas
{
    public function array(array $row)
    {
        
    }
    public function collection(Collection $rows)
    {
        //
        //echo $rows[0];
        
    }
}
