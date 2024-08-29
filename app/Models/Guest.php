<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Guest extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "guest_name",
        "guest_phone",
        "guest_num_attend",
        "guest_prayer"
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
