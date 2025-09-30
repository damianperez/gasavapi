<?php

namespace App\Imports;
use App\Models\User;


use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\Importable;

use Maatwebsite\Excel\Concerns\HasReferencesToOtherSheets;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithConditionalSheets;
use Maatwebsite\Excel\Concerns\SkipsUnknownSheets;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Contracts\Queue\ShouldQueue;


//class GasavImport implements  WithMultipleSheets ,ToModel, WithBatchInserts, WithChunkReading, ShouldQueue
class GasavImport implements  WithMultipleSheets ,ToModel, WithChunkReading,WithBatchInserts, WithHeadingRow
{
    use Importable; // Use the trait
    use WithConditionalSheets;

    
    public function model(array $row)
    {
        return new User([
            'name' => $row[0],
        ]);
    }
    public function collection(Collection $collection)
    {
        //
    }
    /*   
    public function sheets(): array
    {

        
        /*$wsh=[];
        for ($i = 0; $i <= 19; $i++) {
            $wsh[$i]= new FirstSheetImport();
        };
        return $wsh;
         return [
            new FirstSheetImport()
        ];
      
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
        */
    public function onUnknownSheet($sheetName)
    {
        // E.g. you can log that a sheet was not found.
        info("Sheet {$sheetName} was skipped");
    }
    public function conditionalSheets(): array
    {
        return [
            'PADRON' => new PADRONImport(),
            'Worksheet 2' => new FirstSheetImport(),
            'Worksheet 3' => new FirstSheetImport(),
        ];
    }
    public function batchSize(): int
    {
        return 100;
    }
    public function chunkSize(): int
    {
        return 100;
    }
     public function startRow(): int
    {
        return 2;
    }
}
//class PADRONImport implements ToArray, ToCollection, HasReferencesToOtherSheets //, WithCalculatedFormulas
class PADRONImport implements ToModel, ToCollection, HasReferencesToOtherSheets,WithChunkReading,WithBatchInserts,WithStartRow, WithCalculatedFormulas
{
     public function model(array $row)
    {
        /*return DB::table('users')->insertOrIgnore([
           "id"=> $row[0],
            "Nro_socio"=> $row[0],
            "Apellido y nombre"=> $row[1],
             "Lugar de pago" => $row[2],
            "Actividad" => $row[3],
            "Domicilio" =>$row[4],
            "telefono 1"=>$row[5],
            "telefono 2"=>$row[6],
      "E-Mail"=>$row[7],
      "Pago hasta"=>$row[8],
      "Estado"=>$row[9],
      //"Fecha de alta"=>$row[10],
      //"Fecha de baja"=>$row[11],
      "Observaciones"=>$row[12],
      "Antiguedad"=>$row[13],
      "Observaciones Comision Directiva"=>$row[14],
      'email'=>$row[7],
            
        ]);
        */
        return new User([            
            //"id"=> $row[0],
            "Nro_socio"=> $row[0],
            "Apellido y nombre"=> $row[1],
             "Lugar de pago" => $row[2],
            "Actividad" => $row[3],
            "Domicilio" =>$row[4],
            "telefono 1"=>$row[5],
            "telefono 2"=>$row[6],
      "E-Mail"=>$row[7],
      "Pago hasta"=>$row[8],
      "Estado"=>$row[9],
      //"Fecha de alta"=>$row[10],
      //"Fecha de baja"=>$row[11],
      "Observaciones"=>$row[12],
      "Antiguedad"=>$row[13],
      "Observaciones Comision Directiva"=>$row[14],
      'email'=>$row[7],
            
        ]);
    }    
    public function array(array $row)
    {
        
    }
    public function collection(Collection $rows)
    {
        //
       // echo $rows[0];
        
    }
    public function startRow(): int
    {
        return 2;
    }
    public function batchSize(): int
    {
        return 500;
    }
    public function chunkSize(): int
    {
        return 500;
    }
}
class FirstSheetImport implements ToArray, ToCollection,SkipsUnknownSheets , HasReferencesToOtherSheets //, WithCalculatedFormulas
{
    public function startRow(): int
    {
        return 2;
    }
    public function onUnknownSheet($sheetName)
    {
        // E.g. you can log that a sheet was not found.
        info("Sheet {$sheetName} was skipped");
    }
    public function array(array $row)
    {
        
    }
    public function collection(Collection $rows)
    {
        //
        //echo $rows[0];
        
    }
}
