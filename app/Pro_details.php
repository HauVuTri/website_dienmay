<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pro_details extends Model
{
    protected $table ='pro_details';
	protected $guarded =[];

    public function products()
    {
        return $this->belongsTo('App\Products','pro_id','id');
	}
}
