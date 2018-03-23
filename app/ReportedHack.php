<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class ReportedHack extends Eloquent
{
    //
    protected $collection="reported_hacks";

    public function hacks()
    {
    	# code...
    	return $this->hasOne('App\Hack','_id','hack_id');
    }

    public function reason()
    {
    	# code...
		return $this->hasOne("App\Report","report_id","_id");
    }

    public function user()
    {
    	# code...
		return $this->hasOne("App\Users","user_id","_id");
    }

}
