<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsRead extends Model
{
    use SoftDeletes;
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $softDelete = true;
    public $timestamps = true;
    public function setCatAttribute($value)
    {
        $this->attributes['news_source_from'] = json_encode($value);
    }

    public function getCatAttribute($value)
    {
        return $this->attributes['news_source_from'] = json_decode($value);
    }
}
