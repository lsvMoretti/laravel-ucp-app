<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RegistrationAnswer extends Model
{

    protected $table = "registration_answers";

    /**
     * Statuses
     * 0 - Not Answered / Reviewed
     * 1 - Denied / Submit Ban Appeal
     * 2 - Denied / Redo Quiz
     * 3 - Accepted
     */

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'question_id',
        'user_id',
        'answer',
        'status',
        'submission_id'
    ];

    public function question() : BelongsTo
    {
        return $this->belongsTo(RegistrationQuestion::class);
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
