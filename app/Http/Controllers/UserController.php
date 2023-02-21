<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('users');
    }

    public function getData(Request $request)
    {

        $draw = $request->get('draw');
        $start = $request->get('start');
        $rowperpage = $request->get('length');
        $orderArray = $request->get('order');
        $columnArray = $request->get('columns');
        $searchArray = $request->get('search');
        $columnIndex = $orderArray[0]['column'];
        // $columnName = $columnNameArray[$columnIndex]['data'];
        $columnSorttorder = $orderArray[0]['dir'];
        $searchValue = $searchArray['value'];

        $users = \DB::table('product');
        $total = $users->count();


        $arrData = \DB::table('product');
        $arrData = $arrData->get();
        $response = array(
            "draw" => intval($draw),
            "recordsTotal" => $total,
            "data" => $arrData,
        );
        return response()->json($response);
    }
}
