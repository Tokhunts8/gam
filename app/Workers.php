<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workers extends Model
{
    public function parent()
    {
        return $this->belongsTo('App\Blog', 'parent_id', 'id');
    }

    public function about()
    {
        return $this->hasMany("App\ExperienceEducation", "parent_id", "id");
    }

    public function work()
    {
        if (strpos($_SERVER['REQUEST_URI'], 'am')) {
            $select = ['id', 'description', 'from', 'to', 'parent_id'];
        }
        else {
            $select = ['id', 'old as description', 'from', 'to', 'parent_id'];
        }
        return $this->hasMany("App\ExperienceEducation", "parent_id", "id")
            ->select($select)->where('type', '=', 1)
            ->orderBy('from', 'desc');
    }

    public function education()
    {
        if (strpos($_SERVER['REQUEST_URI'], 'am')) {
            $select = ['id', 'description', 'from', 'to', 'parent_id'];
        }
        else {
            $select = ['id', 'old as description', 'from', 'to', 'parent_id'];
        }
        return $this->hasMany("App\ExperienceEducation", "parent_id", "id")
            ->select($select)->where('type', '=', 2)
            ->orderBy('from', 'desc');

    }
}
