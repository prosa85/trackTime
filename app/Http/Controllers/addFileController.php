<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Carbon\Carbon;

use App\Timetrack;

class addFileController extends Controller
{

    public function add(Request $request){
    	if($request->hasFile('csv')){
    		$file = $this->readCsv($request);
                array_shift($file);
                
                foreach ($file as $key => $value) {
                    if($value[1]!=null){

                        $newTimes['start']=Carbon::parse($value[1])->timestamp;
                        $newTimes['end']=Carbon::parse($value[2])->timestamp;
                        $newTimes['week']=Carbon::parse($value[1])->weekOfYear;;
                        $newTimes['user_id'] = \Auth::id();
                        Timetrack::create($newTimes);
                    }
                         
                     } 
    	}
        return redirect()->route('timetrack.index');
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
