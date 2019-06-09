<?php

namespace App;

use Watson\Rememberable\Rememberable;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    // Import package for caching
    use Rememberable;

    // Define allowed assignments
    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'header_title',
        'summary',
        'seo_title',
        'seo_description',
        'is_active',
        'robots',
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Get the experiences for the article.
    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }

    // Get the qualifications for the article.
    public function qualifications()
    {
        return $this->hasMany(Qualification::class);
    }

    // Get the skills for the article.
    public function skills()
    {
        return $this->hasMany(Skill::class);
    }

    // Get the contact info for the article.
    public function contactInfos()
    {
        return $this->hasMany(ContactInfo::class);
    }
}