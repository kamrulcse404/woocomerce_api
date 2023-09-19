<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Woocomerce extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'api_url', 'api_key', 'api_secret', 'tag_id'];

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
