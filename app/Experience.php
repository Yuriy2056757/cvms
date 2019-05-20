<?php

namespace App;

use App\Article;
use Watson\Rememberable\Rememberable;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{

    // Import package for caching
    use Rememberable;

    // Define allowed assignments
    protected $fillable = [
        'company_name',
        'title',
        'description',
        'date_start',
        'date_end',
    ];

    // Get the article that owns the experience.
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}