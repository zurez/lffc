<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class SpecialHack extends Eloquent
{
    protected $collection="specialhacks";

    public function hack()
    {
    	# code...
    	return $this->hasOne("App\Hack","_id","hack_id");
    }
}
