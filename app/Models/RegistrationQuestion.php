<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RegistrationQuestion extends Model
{
    protected $table = "registration_questions";

    public function answers():HasMany{
        return $this->hasMany(RegistrationAnswer::class);
    }
}
