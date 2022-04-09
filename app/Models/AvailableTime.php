<?php

namespace App\Models;

class AvailableTime extends BaseModel
{
    public function appointment()
    {
        return $this->has(Appointment::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class,'doctor_id');
    }


}
