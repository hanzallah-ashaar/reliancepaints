<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    //

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'page_id'
    ];


    public function user(){
        return $this->belongsToMany('App\User')->withTimestamps();
    }

}
