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
class GasavImport implements  WithMultipleSheets ,ToArray, WithHeadingRow
{
    use Importable; // Use the trait
    use WithConditionalSheets;

    public function array(array $array)
    {
        // This method receives the entire sheet as an array.
        // You can perform any processing here if needed,
        // but for a simple conversion to array, you might not need to modify this.
        return $array;
    }
   

      
    public function conditionalSheets(): array
    {

        return [             
           'Cuadro tarifario'=> new CuadroTarifarioImport(),
           'PADRON' => new PADRONImport(),            
           'Valores vigentes'=> new CuadroTarifarioImport(),
           'Pagos' => new PagosImport(),            
            
        ];
        
        
        
    }
    
}
class CuadroTarifarioImport implements ToArray, ToCollection,HasReferencesToOtherSheets 
{   
    public function array(array $row)
    {
      //  return 'aa';
    }
    public function collection(Collection $rows)
    {    
      //echo $rows[0];
    }
}




class PagosImport implements ToArray, ToCollection,HasReferencesToOtherSheets  #,  WithCalculatedFormulas,HasReferencesToOtherSheets
{
  
    public function array(array $row)
    {
     //   return 'ab';    
        
    }    
    public function collection(Collection $rows)
    {
        //
       // echo $rows[0];
       //   return ['ac'];
        
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
class PADRONImport implements ToArray, ToCollection,HasReferencesToOtherSheets  ,  WithCalculatedFormulas
{
  
    public function array(array $row)
    {
     //   return 'ab';    
        
    }    
    public function collection(Collection $rows)
    {
        //
       // echo $rows[0];
       //   return ['ac'];
        
    }
        
    public function model(array $row)
    {   
       // return ['aa'];
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
      'email'=>$row[7],1            
        ]);
        */

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

