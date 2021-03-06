<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CountriesTable extends Model
{
    protected $dates = ['created_at', 'updated_at'];

    public function parent()
    {
        return $this->belongsTo('App\Blog', 'parent_id', 'id');
    }
}
