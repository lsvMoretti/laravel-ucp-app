<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RegistrationQuestion extends Model
{
    protected $table = "registration_questions";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'question',
        'is_active'
    ];

    public function answers():HasMany{
        return $this->hasMany(RegistrationAnswer::class);
    }
}
