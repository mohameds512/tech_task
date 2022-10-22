<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class getFile extends Controller
{
    public function getPath(Request $request)
    {
        try {
            //var\log\file.eg
            $path = storage_path($request->file_path);
            $file = fopen($path , "r");
            $data = [];
            while(! feof($file)) {
                $line = fgets($file);
                array_push($data,$line);
            }

            fclose($file);
            return $data;
        } catch (\Exception $e) {
            return ['error'=> $e->getMessage() ] ;
        }
        //var\log\file.eg
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
