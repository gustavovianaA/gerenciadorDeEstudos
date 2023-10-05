<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phase extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','profile_id','name','status','description','goal','start_date','expected_end_date','end_date'];

    protected $dates= ['start_date','expected_end_date','end_date'];

    public function topics()
    {
        return $this->belongsToMany(Topic::class);
    }
   
}
