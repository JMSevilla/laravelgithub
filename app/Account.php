<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Account extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'location','usertype_id', 'password'];
    
    public function usertype(){
      return $this->belongsTo(AccountType::class);
    }
}
