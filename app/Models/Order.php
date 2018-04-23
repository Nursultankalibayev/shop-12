<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
class Order extends Model
{
    protected $table = 'orders';
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

    public function getFullNameUser($userId)
    {
        $user = User::where('id',$userId)->select(DB::raw("CONCAT(last_name,' ',first_name) as fullName"))->first();
        return isset($user) ? $user : '';
    }
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
