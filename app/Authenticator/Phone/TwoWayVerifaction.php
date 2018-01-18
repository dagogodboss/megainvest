<?php

namespace App\Authenticator\Phone;

use Illuminate\Database\Eloquent\Model;

class TwoWayVerifaction extends Model
{
    protected $fillable = [
    	'user_id',
    	'token',
    	'validated',
    ];

    public function user(){
    	return $this->belongsTo(User::class);
    }
}
