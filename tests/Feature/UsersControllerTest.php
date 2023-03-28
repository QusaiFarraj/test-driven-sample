<?php

namespace Tests\Feature;

 use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Tests\TestCase;

class UsersControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_users_can_be_retrieved(): void
    {
        User::factory()->count(10)->create();

        $response = $this->get(route('api.users'));

        $response->assertStatus(200);
        $this->assertDatabaseCount(User::class, 10);
        $this->assertEquals(10, $response->json('data'));
    }

    public function test_user_can_be_created(): void
    {
        $data = [
            'name' => 'tester phpunit',
            'email' => fake()->email,
            'employee_id' => generateEmployeeId(),
        ];
        $response = $this->get(route('api.users.create', $data));

        $response->assertStatus(201);
        $this->assertDatabaseHas(User::class, $data);
    }

    public function test_user_can_be_edited(): void
    {
        $user = User::factory()->create();

        $data = [
            'name' => 'tester phpunit',
            'email' => fake()->email,
            'employee_id' => generateEmployeeId(),
        ];
        $response = $this->get(route('api.users.edit', array_merge(['user' => $user->id], $data)));

        $response->assertStatus(201);
        $this->assertDatabaseHas(User::class, $data);
    }

    public function test_user_can_be_retrieved(): void
    {
        $user = User::factory()->create();

        $response = $this->get(route('api.users.edit', ['user' => $user->id]));

        $response->assertStatus(200);
        $response->assertSeeText($user->name);
        $response->assertSeeText($user->email);
    }

    public function test_user_can_be_deleted(): void
    {
        $user = User::factory()->create();

        $response = $this->get(route('api.users.delete', ['user' => $user->id]));

        $response->assertStatus(200);
        $response->assertSeeText('user deleted');
    }
}

