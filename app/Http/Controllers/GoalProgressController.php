<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGoalProgressRequest;
use App\Models\GoalProgress;

class GoalProgressController extends Controller
{
    public function store(StoreGoalProgressRequest $request)
    {
        $goalProgress = GoalProgress::create($request->validated());

        return response()->json([
            'message' => 'Progress saved successfully.',
            'data' => $goalProgress
        ], 201);
    }
}
