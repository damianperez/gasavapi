<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response; // Import Response facade if not using the helper

class SociosController extends Controller
{
    //
    public function index(Request $request)
    {        
        $p1 = $request->route('p1');
        $p2 = $request->route('p2');
        $p3 = $request->route('p3');
        $p4 = $request->route('p4');

        $SQL = 'SELECT * FROM users';
        if ($p1 )
            if (is_numeric($p1)) 
                $SQL .= " WHERE Nro_socio='$p1'";
                else
                $SQL .= " WHERE (`Apellido y nombre` like '%$p1%' OR `Lugar de pago` like '%$p1%' OR Actividad like '%$p1%')";
        
        
        if ($p2) {
            $SQL .= " AND ( `Apellido y nombre` like '%$p2%' OR `Lugar de pago` like '%$p2%' OR Actividad like '%$p2%' )    ";
        }
        if ($p3) {
            $SQL .= " AND ( `Apellido y nombre` like '%$p3%' OR `Lugar de pago` like '%$p3%' OR Actividad like '%$p3%' )    ";
        }
        if ($p4) {
            $SQL .= " AND ( `Apellido y nombre` like '%$p4%' OR `Lugar de pago` like '%$p4%' OR Actividad like '%$p4%' )    ";
        }
        $users = DB::connection('mariagasav')->select($SQL);
        return response()->json($users);
        foreach ($users as $user) {
                echo 
                $user->Nro_socio.
	//$user->`Apellido y nombre`.
	//$user->`Lugar de pago`.
	$user->Actividad. 
	$user->Domicilio; 
}

        return ;
    }
}
