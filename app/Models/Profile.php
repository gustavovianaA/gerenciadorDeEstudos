<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','name','description','image'];

    public function phases()
    {
        return $this->HasMany(Phase::class);
    }

    public function topics()
    {
        return $this->HasMany(Topic::class);
    }

    public function notes()
    {
        return $this->HasMany(Note::class);
    }
}
