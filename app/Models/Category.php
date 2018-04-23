<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    protected $table = 'categories';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function category()
    {
        return $this->hasOne('App\Models\Category','id','parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Models\Category','parent_id','id');
    }

}
