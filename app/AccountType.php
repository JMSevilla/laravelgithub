<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class AccountType extends Model
{
    use Translatable;
    protected $translatable = ['title', 'description'];    
  
    public function usersubtype(){
      return $this->belongsTo(AccountSubtype::class);
    }
}
