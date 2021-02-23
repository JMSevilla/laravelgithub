<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;


class AccountSubtype extends Model
{ 
  use Translatable;
  protected $translatable = ['name', 'description'];    

  public function children() {
      return $this->hasMany(AccountSubtype::class, 'parent_id')
          ->with('children')
          ->orderBy('order');
  }
      /**
     * Return the Highest Order Menu Item.
     *
     * @param number $parent (Optional) Parent id. Default null
     *
     * @return number Order number
     */
    public function highestOrderMenuItem($parent = null)
    {
        $order = 1;

        $item = $this->where('parent_id', '=', $parent)
            ->orderBy('order', 'DESC')
            ->first();

        if (!is_null($item)) {
            $order = intval($item->order) + 1;
        }

        return $order;
    }
}
