<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Log extends Model
{
    use HasFactory;

    public function isLoggable() {
        $updated = Carbon::parse($this->updated_at);
        if( $updated->add(1, 'day') < Carbon::now() ) {
            return true;
        }

        return false;
    }
}
