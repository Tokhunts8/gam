<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Blog extends Model
{

    public function parent()
    {
        return $this->belongsTo('App\Blog', 'parent_id', 'id');
    }

    public function types()
    {
        return $this->hasOne('App\Types', 'id', 'type');
    }

    public function children()
    {
        if (strpos($_SERVER['REQUEST_URI'], 'am')) {
            $select = ['id', 'name', 'description', 'image', 'type', 'parent_id'];
        }
        else {
            $select = ['id', 'oln as name', 'old as description', 'type', 'image', 'parent_id'];
        }
        return $this->hasMany('App\Blog', 'parent_id', 'id')->select($select)
            ->orderBy('order', 'asc');
    }

    public function worker()
    {
        if (strpos($_SERVER['REQUEST_URI'], 'am')) {
            $select = ['id', 'name', 'surname', 'position', 'image', 'parent_id'];
        }
        else {
            $select = ['id', 'oln as name', 'ols as surname', 'olp as position', 'image', 'parent_id'];
        }
        return $this->hasMany('App\Workers', 'parent_id', 'id')->select($select)->orderBy('order', 'asc');
    }

    public function asset()
    {
        $select = $this->selectCharts();

        return $this->hasMany('App\assetAllocation', 'parent_id', 'id')->select($select);
    }

    public function areas()
    {
        $select = $this->selectCharts();

        return $this->hasMany('App\byAreas', 'parent_id', 'id')->select($select);
    }

    public function currencies()
    {
        return $this->hasMany('App\byCurrencies', 'parent_id', 'id');
    }

    public function countries()
    {
        return $this->hasOne('App\CountriesTable', 'parent_id', 'id')->select(['countryCode as id', 'country as name', 'value', 'parent_id', 'created_at']);
    }

    public function fund()
    {
        $select = $this->selectCharts();

        return $this->hasMany('App\fundPerformance', 'parent_id', 'id')->select($select);
    }

    public function maturity()
    {
        $select = $this->selectCharts();

        return $this->hasMany('App\maturitySummary', 'parent_id', 'id')->select($select);
    }

    public function nav()
    {
        return $this->hasOne('App\navChart', 'parent_id', 'id');
    }

    private function selectCharts()
    {
        if (strpos($_SERVER['REQUEST_URI'], 'am')) {
            $select = ['name'];
        }
        else {
            $select = ['oln as name'];
        }
        return array_merge($select, ['value', 'created_at', 'parent_id']);
    }

}
