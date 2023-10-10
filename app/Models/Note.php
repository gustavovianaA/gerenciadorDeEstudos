<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','profile_id','topic_id','name','content'];

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
}
