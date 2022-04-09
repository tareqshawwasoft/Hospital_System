<?php

namespace App\Models;

class Appoinment extends BaseModel
{
    public function availableTime()
    {
        return $this->belongsTo(AvailableTime::class);
    }
}
