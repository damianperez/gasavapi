<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response; // Import Response facade if not using the helper

class SociosController extends Controller
{
    //
    public function index()
    {        
        $p1 = $request->route('p1');
        $p2 = $request->route('p2');
        $p3 = $request->route('p3');
        $p4 = $request->route('p4');

        $SQL = 'SELECT * FROM users';
        if ($p1) {
            $SQL .= " WHERE Nro_socio='$p1'";
        }
        if ($p2) {
            $SQL .= " AND `Apellido y nombre`='$p2'";
        }
        if ($p3) {
            $SQL .= " AND `Lugar de pago`='$p3'";
        }
        if ($p4) {
            $SQL .= " AND Actividad='$p4'";
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
