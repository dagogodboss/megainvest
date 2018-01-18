<?php

namespace App\Authenticator\Email;

use Illuminate\Database\Eloquent\Model;

class EmailMagicToken extends Model
{
    const TOKEN_EXPIRY = 30;

    protected $fillable = [
    	'user_id',
    	'validated',
    	'email_token',
    ];

    public function isExpired()
    {
    	return $this->updated_at->diffInMinutes(Carbon::now()) > self::TOKEN_EXPIRY;
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
