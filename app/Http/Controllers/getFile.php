<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class getFile extends Controller
{
    public function getPath(Request $request)
    {
        //logs\file.eg
        $path = storage_path($request->file_path);
        $file = fopen($path , "r");
        $data = [];
        while(! feof($file)) {
            $line = fgets($file);
            array_push($data,$line);
        }

        fclose($file);
        return $data;
    }

}
