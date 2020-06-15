<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    public function parent()
    {
        return $this->belongsTo('App\Blog', 'parent_id', 'id');
    }
}
