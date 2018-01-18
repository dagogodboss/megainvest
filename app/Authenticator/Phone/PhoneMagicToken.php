<?php

namespace App\Authenticator\Phone;

use Illuminate\Database\Eloquent\Model;

class PhoneMagicToken extends Model
{
    protected $fillable = [
    	'user_id',
    	'validated',
    	'phone_token',
    ];

    public function user(){
    	return $this->belongsTo(User::class); 
    }
}
