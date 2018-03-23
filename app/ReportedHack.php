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
    	return $this->belongsTo('App\Hack','_id','hack_id');
    }

    public function reason()
    {
    	# code...
		return $this->hasOne("App\Report","_id","report_id");
    }

    public function user()
    {
    	# code...
		return $this->hasOne("App\Users","_id","user_id");
    }

}
