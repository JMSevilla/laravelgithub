<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class SearchInput extends Model
{
    use Translatable;
//     protected $translatable = ['field_title'];
    protected $translatable = ['field_title', 'option_fields'];
}
