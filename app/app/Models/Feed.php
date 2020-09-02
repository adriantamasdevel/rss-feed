<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * Class Feed
 * @package App
 *
 * @property integer $id
 * @property string $title
 * @property string $url
 * @property string $provider_url
 */
class Feed extends Model
{

    protected $guarded = [];
}