<?php

namespace App;

use App\Article;
use Watson\Rememberable\Rememberable;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{

    // Import package for caching
    use Rememberable;

    // Define allowed assignments
    protected $fillable = [
        'article_id',
        'title',
        'percentage',
    ];

    // Get the article that owns the skill.
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}