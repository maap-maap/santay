<?php

namespace App\Models;

use App\Models\Merchant;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    //
    protected $guarded = [];
    public function merchant(): BelongsTo
    {
        return $this->belongsTo(Merchant::class);
    }
}
