<?php

namespace App;

use Watson\Rememberable\Rememberable;
use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{

    // Import package for caching
    use Rememberable;

    // Define allowed assignments
    protected $fillable = [
        'article_id',
        'title',
        'description',
    ];

    // Get the article that owns the contact info.
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}