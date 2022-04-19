<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    public function connections()
    {
       return $this->belongsTo(Connection::class, 'connection_id');
    }
}
