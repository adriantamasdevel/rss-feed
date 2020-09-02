<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Feed;

class Post extends Model
{
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function feed()
    {
        return $this->belongsTo(Feed::class);
    }
}