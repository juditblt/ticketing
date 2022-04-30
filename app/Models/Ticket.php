<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Ticket extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function user(){
        return $this->belongsTo(User::class);
        //return $this->belongsTo(User::class, 'user_id');
        //return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function statusPrio(){
        return $this->status . "-" . $this->priority;
    }
}
