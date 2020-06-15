<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class navChart extends Model
{
    protected $dates = ['created_at', 'updated_at'];

    public function parent()
    {
        if (strpos($_SERVER['REQUEST_URI'], 'am')) {
            $select = ['id', 'name'];
        }
        else {
            $select = ['id', 'oln as name'];
        }
        return $this->belongsTo('App\Blog', 'parent_id', 'id')->select($select);
    }
}
