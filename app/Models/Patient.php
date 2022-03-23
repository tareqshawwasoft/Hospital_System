<?php

namespace App\Models;

class Patient extends BaseModel
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
