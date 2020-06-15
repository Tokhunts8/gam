<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ExperienceEducation extends Model
{

    protected $dates = ['created_at', 'updated_at', 'from', 'to'];

    public function parent()
    {
        return $this->belongsTo('App\Workers', 'parent_id', 'id');
    }
}
