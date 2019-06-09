<?php

namespace App;

use Watson\Rememberable\Rememberable;
use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{

    // Import package for caching
    use Rememberable;

    // Set custom date fields to be parsed automatically
    protected $dates = [
        'date_start',
        'date_end',
    ];

    // Define allowed assignments
    protected $fillable = [
        'article_id',
        'title',
        'description',
        'date_start',
        'date_end',
    ];

    // Get the article that owns the qualification.
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}