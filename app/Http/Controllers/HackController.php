<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Hack;
use App\SpecialHack;
use App\Partners;
use App\ReportedHack;
use Carbon;
use DB;
use MongoDB;

class HackController extends Controller
{
    public function edit_hack($id)
    {
    	$hack=Hack::find($id);
    	// dd($hack);
        return view("hack.edit")
        ->with("title","Edit Hack")
        ->with("hack",$hack)
        ;
    }

    public function add_hack()
    {
    	return view("hack.add")
    	->with("title","Add Hack");
    }


    public function special_hack()
    {
    	$sp=SpecialHack::get();
    	// foreach ($sp as $s) {
    	// 	# code...
    	// 	if (!empty($s->hack)) {
    	// 		# code...
    	// 		dump($s->hack);
    	// 	}
    		
    	// }
    	 
    	return view("hack.special_hack")
    	->with("shacks",$sp)
    	;
    }

    public function reported_hack()
    {
    	# code...
    	$rps=ReportedHack::where("status","active")->
    	get();

    	$kv=[];

    	foreach ($rps as $r) {
    		// dump($r->hack_id->oid);
    		try {
    			$kv[(string) new MongoDB\BSON\ObjectId($r->hack_id)]+=1;
    		} catch (\Exception $e) {
    			$kv[(string) new MongoDB\BSON\ObjectId($r->hack_id)]=1;
    		}
    	}
    
    	$ret=[];
    	foreach ($kv as $key=>$value) {
    		$temp=(object)array();
    		$hack_id=new MongoDB\BSON\ObjectId($key);
    		
    		$hack=Hack::whereRaw(['_id' =>$hack_id])->first();
    		$temp->hack=$hack;
    		$temp->count=$value;
    		array_push($ret,$temp);
    	}
    	return view("hack.reports")
    	->with("shacks",$ret);

    	return $ret;
    }

    public function resolve_hack($hack_id)
    {
    	$hack_id=new MongoDB\BSON\ObjectId($hack_id);
    	ReportedHack::whereRaw(["hack_id"=>$hack_id])
    	->update(["status"=>"resolved"]);
    	return "Resolved";
    }
    public function ownership_hack($type)
    {
    	$data=array();
    	switch ($type) {
    		case 'admin_published':
    			$data=Hack::where("author","Crumblyy")

    			->orWhere("author",null)
    			->where("deleted",false)
    			->where("approved",true)
    			
    			->get();
    			// foreach ($data as $d) {
    			// 	# code...
    			// 	if (!empty($d->reports)) {
    			// 		# code...
    			// 		dump($d->reports);
    			// 	}
    				
    			// }return;
    			break;
    		case 'admin_draft':
    			# code...
    			$data=Hack::where("author","Crumblyy")

    			->orWhere("author",null)
    			->where("deleted",false)
    			->where("approved",false)
    			->get();
    			break;
    		case 'partner_published':
    			# code...
    			$hpartners=Partners::get();
    			$partners=[];
    			foreach ($hpartners as $p) {
    				# code...
    				if (!empty($p->name) and $p->name!="Crumblyy") {
    					# code...
    					array_push($partners,$p->name);
    				}
    				
    			}
    			
    			$data=Hack::

    			 where("deleted",false)
    			->where("approved",true)
    			->whereIn("author",$partners)
    			->where("author","!=","Crumblyy")

    			->get();
    			break;
    		case 'partner_draft':
    			# code...
    			$hpartners=Partners::get();
    			$partners=[];
    			foreach ($hpartners as $p) {
    				# code...
    				if (!empty($p->name) and $p->name!="Crumblyy") {
    					# code...
    					array_push($partners,$p->name);
    				}
    				
    			}
    			
    			$data=Hack::

    			 where("deleted",false)
    			->where("approved",false)
    			->whereIn("author",$partners)
    			->where("author","!=","Crumblyy")

    			->get();
    			break;
    		default:
    			# code...
    			break;
    	}


    	return view("hack.ownership_hack")
    	->with("shacks",$data)

    	;
    }
}
