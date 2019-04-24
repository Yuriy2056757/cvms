<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'header_title',
        'summary',
        'seo_title',
        'seo_description',
    ];
}