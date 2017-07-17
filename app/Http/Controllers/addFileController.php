<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class addFileController extends Controller
{

    public function add(Request $request){
    	if($request->hasFile('csv')){
    		$file = $this->readCsv($request);
    		dd($file);
    	}
    }

    public function readCsv($request){
    	$csvfile = $request->file('csv');
    	// dd($request->hasFile('csv'));
    	// dd($csvfile);
    	$file_handle = fopen($csvfile, 'r');
    	    while (!feof($file_handle) ) {
    	        $line_of_text[] = fgetcsv($file_handle, 1024);
    	    }
    	    fclose($file_handle);
    	     
    	    
    	return $line_of_text;
    }
}
