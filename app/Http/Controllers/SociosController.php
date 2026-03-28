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
        // Use the 'mysql_secondary' connection instead of the default
        $users = DB::connection('mariagasav')->select('SELECT * FROM users');
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
