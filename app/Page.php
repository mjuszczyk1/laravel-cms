<?php

namespace App;

class Page extends Model
{
    // protected $primaryKey = 'id';
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function url($action = null)
    {
        if (!empty($action)) {
            return "/page/{$action}/{$this->id}";
        } else {
            return (!empty($this->slug)) ? "/page/{$this->slug}" : "/page/{$this->id}";
        }
    }
}
