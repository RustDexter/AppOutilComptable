<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calendrier;
use Auth;
class CalendrierController extends Controller
{
    public function index(Request $request)
    {
    	if($request->ajax())
    	{
            
    		$data = Calendrier::whereDate('start', '>=', $request->start)
                            ->whereDate('end',   '<=', $request->end)
                            ->where('user_id','=', Auth::user()->id)
                            ->get(['id', 'title', 'start', 'end']);
            return response()->json($data);
    	}
    	return view('calendrier');
    }

    public function action(Request $request)
    {
        
    	if($request->ajax())
    	{
			if($request->type == 'add')
    		{
    			$event = Calendrier::create([
                    
    				'title'		=>	$request->title,
                    'user_id'   => Auth::user()->id ,
    				'start'		=>	$request->start,
    				'end'		=>	$request->end
    			]);

    			return response()->json($event);
    		}
    		if($request->type == 'update')
    		{
    			$event = Calendrier::find($request->id)->update([
    				'title'		=>	$request->title,
    				'start'		=>	$request->start,
    				'end'		=>	$request->end
    			]);

    			return response()->json($event);
    		}

    		if($request->type == 'delete')
    		{
    			$event = Calendrier::find($request->id)->delete();

    			return response()->json($event);
    		}
    	}
    }
}