<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class Product extends Model
{
     protected $table = 'products';
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

    public function category()
    {
        return $this->hasOne('App\Models\Category','id','category_id');
    }

    public function image()
    {
        return $this->belongsTo('App\Models\Image','id','product_id')->where('type',1);
    }

    public function images()
    {
        return $this->hasMany('App\Models\Image','product_id')->where('type',0);
    }

    public function checkSession($productId)
    {
        $result = FALSE;
        $sessions = Session::get('products');
        if (count($sessions)){
            foreach ($sessions as $session) {
                 if ($session['id'] == $productId)
                    $result = TRUE;
            }
        }
        return $result;

    }
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
