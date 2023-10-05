<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','profile_id','name','description'];

    public function phases()
    {
        return $this->belongsToMany(Phase::class);
    }

    public function notes()
    {
        return $this->HasMany(Note::class);
    }
}
