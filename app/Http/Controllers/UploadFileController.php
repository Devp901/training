<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\product;


class UploadFileController extends Controller
{
    public function index()
    {
        return view('uploadfile');
    }
    public function showUploadFile(Request $request)
    {
        $file = $request->file('image');
        $imagepath = "";
        if (!empty($request->hasfile('image'))) {
            //Display File Name
            echo 'File Name: ' . $file->getClientOriginalName();
            echo '<br>';

            //Display File Extension
            echo 'File Extension: ' . $file->getClientOriginalExtension();
            echo '<br>';

            //Display File Real Path
            echo 'File Real Path: ' . $file->getRealPath();
            echo '<br>';

            //Display File Size
            echo 'File Size: ' . $file->getSize();
            echo '<br>';

            //Display File Mime Type
            echo 'File Mime Type: ' . $file->getMimeType();

            //Move Uploaded File
            $destinationPath = 'uploads';
            $file->move($destinationPath, trim($file->getClientOriginalName()));
            $imagepath = $destinationPath . '/' . $file->getClientOriginalName();
        }
        // dd($imagepath);
        $product = new Product();
        $product->product_name = 'pc';
        $product->product_description = 'this is a pc';
        $product->product_sku = '415425a23';
        $product->product_cost = '1500';
        $product->product_image = trim($imagepath);
        $product->save();
    }
}
