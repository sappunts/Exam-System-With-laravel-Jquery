<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposition extends Model
{
    protected $fillable = [
        'proposition', 'answer1', 'answer2','answer3','answer4','true_answer'
    ];

}
