<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Ticket extends Model
{
    use HasFactory;

    public function user(): HasOne {
        return $this->hasOne(User::class);
    }

    public function status(): HasOne {
        return $this->hasOne(TicketStatus::class)

    }
}
