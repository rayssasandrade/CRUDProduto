<?php

namespace App\Http\Controllers;
use App\Models\Cliente;
use Illuminate\Http\Request;
use DB;

class DataController extends Controller
{
    public function getClientes()
    {
        $clientes = DB::table('clietes')->pluck("name","id");
        return view('dropdown',compact('clientes'));
    }
}