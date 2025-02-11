<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;


class SystemEvent extends Model
{
    public $timestamps = false;
    protected $collection = 'system_events';
}
