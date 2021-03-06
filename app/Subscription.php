<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class Subscription extends Model
{

    protected $appends =['subscriptionDate'];

    public function getsubscriptionDateAttribute()
    {
        return Carbon::parse($this->created_at)->isoformat('Do MMMM Y H:ss a');
    }
}
