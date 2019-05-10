<?php

namespace App;

use App\Experience;
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

    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }
}