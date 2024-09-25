<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrlShortener extends Model
{
    protected $table = 'url_shortness';
    use HasFactory;

    protected $fillable = [
        'short_url',
        'original_url',
    ];
}
