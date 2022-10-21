<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class getFile extends Controller
{
    public function getPath(Request $request)
    {
        //logs\file.eg
        $path = storage_path($request->file_path);
        // $path = storage_path('\logs\file.eg');
        $file = fopen($path , "r");
        $data = [];
        //Output lines until EOF is reached
        while(! feof($file)) {
            $line = fgets($file);
            // echo $line. "<br>";
            array_push($data,$line);
        }

        fclose($file);
        return $data;
    }

    // public function test( )
    // {
    //     $path = storage_path('\logs\file.eg');
    //     $file = fopen($path , "r");
    //     $data = [];
    //     //Output lines until EOF is reached
    //     while(! feof($file)) {
    //         $line = fgets($file);
    //         // echo $line. "<br>";
    //         array_push($data,$line);
    //     }

    //     fclose($file);
    //     return $data;
    // }
}
