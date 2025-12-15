<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StripeSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'stripe_type',
        'publish_key',
        'secret_key',
        'webhook_secret',
    ];
}
