<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoalProgress extends Model
{
    protected $fillable = ['employee_id', 'goal_id', 'progress'];
}
