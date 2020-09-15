<?php

namespace App;

use Bavix\Wallet\Interfaces\Customer;
use Bavix\Wallet\Interfaces\WalletFloat;
use Bavix\Wallet\Traits\CanPay;
use Bavix\Wallet\Traits\CanPayFloat;
use Bavix\Wallet\Traits\HasWalletFloat;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable implements Customer
{
    use HasApiTokens, Notifiable,CanPayFloat;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role','title','location','rate','mobile','description','cover_pic'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function skills(){
        return $this->belongsToMany('App\Skill');
      }
    public function attachments(){
        return $this->morphMany('App\Attachment','attachee');
    }
    public function tasks(){
        return $this->hasMany('App\Task');
    }

    public function reviews(){
        return $this->hasMany('App\Review');
    }
    public function bids(){
        return $this->hasMany('App\Bid');
    }
    public function favorites(){
        return $this->hasMany('App\Favorite');
    }
}
