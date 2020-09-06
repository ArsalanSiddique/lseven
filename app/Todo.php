<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Steps;

class Todo extends Model
{
    protected $fillable = ['title', 'completed', 'user_id', 'description'];


    public function steps()
    {
        return $this->hasMany(Steps::class);
    }
}
