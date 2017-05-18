<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Page;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
     * Set relationship for pages
     *
     * @return 
     */
    public function page()
    {
        return $this->hasMany(Page::class);
    }

    public function create_page(Page $page)
    {
        // $page['#attributes']['user_id']
        $this->page()->save($page);
    }
}
