<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Employee;
use App\Models\Goal;
use App\Models\GoalProgress;

class GoalProgressTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_saves_goal_progress_successfully()
    {
        $employee = Employee::factory()->create();
        $goal = Goal::factory()->create();

        $payload = [
            'employee_id' => $employee->id,
            'goal_id' => $goal->id,
            'progress' => 75,
        ];

        $response = $this->postJson('/api/progress', $payload);

        $response->assertStatus(201)
                 ->assertJsonFragment(['progress' => 75]);

        $this->assertDatabaseHas('goal_progress', $payload);
    }

    /** @test */
    public function it_fails_validation_if_progress_is_missing()
    {
        $employee = Employee::factory()->create();
        $goal = Goal::factory()->create();

        $payload = [
            'employee_id' => $employee->id,
            'goal_id' => $goal->id,
        ];

        $response = $this->postJson('/api/progress', $payload);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['progress']);
    }

    /** @test */
    public function it_fails_if_employee_or_goal_does_not_exist()
    {
        $payload = [
            'employee_id' => 999,
            'goal_id' => 888,
            'progress' => 60,
        ];

        $response = $this->postJson('/api/progress', $payload);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['employee_id', 'goal_id']);
    }

    /** @test */
    public function it_fails_if_progress_is_out_of_range()
    {
        $employee = Employee::factory()->create();
        $goal = Goal::factory()->create();

        $payload = [
            'employee_id' => $employee->id,
            'goal_id' => $goal->id,
            'progress' => 150, // invalid
        ];

        $response = $this->postJson('/api/progress', $payload);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['progress']);
    }
}
