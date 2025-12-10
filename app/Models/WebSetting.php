<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebSetting extends Model
{
   protected $fillable = [
        'site_name',
        'logo',
        'favicon',
        'seo_meta_title',
        'seo_meta_description',
        'contact_email',
        'social_links'
    ];

    protected $casts = [
        'social_links' => 'array',
    ];
}
