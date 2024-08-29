<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Marriage extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'marriage_location', 'marriage_start'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
