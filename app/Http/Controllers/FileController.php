<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageSubmit(Request $request)
    {
        $file = $request->file('file');
        $dir = 'public/images';
        $path = $file->store($dir);
        $filename = str_replace("$dir/",'', $path);

    	return $filename;
    }



    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function pdfSubmit(Request $request)
    {
        $file = $request->file('file');
        $dir = 'public/docs';
        $path = $file->store($dir);
        $filename = str_replace("$dir/",'', $path);

    	return $filename;
    }
}
