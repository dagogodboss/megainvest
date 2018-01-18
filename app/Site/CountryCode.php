<?php

namespace App\Site;

use Illuminate\Database\Eloquent\Model;

class CountryCode extends Model
{
    protected $fillable = [
    	'code',
    	'country',
    ]; 
    
    public function user(){
    	return $this->hasOne('App\User');
    }
}
