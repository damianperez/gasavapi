<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SociosController extends Controller
{
    //
    public function index()
    {
        // Use the 'mysql_secondary' connection instead of the default
        $users = DB::connection('mariagasav')->select('SELECT * FROM users');

        foreach ($users as $user) {
                echo $user->name;
}
        return ;
    }
}
