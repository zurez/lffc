<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Hack extends Eloquent
{
    //
    protected $collection="hacks";

    public function reports()
    {
    	return $this->belongsToMany("App\ReportedHack","hack_id","_id");
    }
}
