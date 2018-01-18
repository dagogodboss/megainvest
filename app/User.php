<?php

namespace App;

use App\User\Traits\WalletTrait;
use App\User\Traits\UserProperty;
use App\User\Traits\ProfileTrait;
use App\User\Traits\RelationshipTrait;
use Illuminate\Notifications\Notifiable;
use App\Authenticator\AuthTrait\AuthTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, AuthTrait, UserProperty, RelationshipTrait, WalletTrait, ProfileTrait;

    protected $fillable = [
        'name', 'email', 'password', 'stage', 'phone_number', 'country_code_id','social_uuid','social_avatar', 'tfa_security',
    ];
    
    protected $hidden = [
        'password', 'remember_token',
    ];
}
