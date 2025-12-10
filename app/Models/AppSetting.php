<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppSetting extends Model
{
    protected $fillable = ['theme', 'push_notification', 'feature_flags', 'app_version'];
    protected $casts = ['feature_flags' => 'array', 'push_notification' => 'boolean'];
}
