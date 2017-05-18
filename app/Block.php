<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    // public function block_area()
    // {
    //     return $this->hasMany(BlockArea::class);
    // }

    public function url($action = null)
    {
        if (!empty($action)) {
            return "/page/{$action}/{$this->id}";
        } else {
            return "/block/{$this->id}";
        }
    }
}
