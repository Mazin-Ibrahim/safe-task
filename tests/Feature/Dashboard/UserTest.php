<?php

namespace Tests\Feature\Dashboard;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use function MongoDB\BSON\toJSON;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
    * @test
    */
    public function can_get_users_list()
    {
        $this->login();

        $this->get('/dashboard/users')
            ->assertHasProp('users')
            ->assertPropCount('users', 1);
    }

    /**
     * @test
     */
    public function can_create_new_user()
    {
        $this->login();

        $this->post('/dashboard/users', [
            'name' => 'Jone Doe',
            'email' => 'test@test.com',
            'password' => 'password',
            'password_confirmation' => 'password'
        ]);

        $this->assertDatabaseHas('users', ['name' => 'Jone Doe']);
    }

    /**
     * @test
     */
    public function can_update_user()
    {
        $user = factory(User::class)->create([
            'name' => 'Jone Doe',
            'email' => 'test@test.com',
        ]);


        $this->login();

        $this->put("/dashboard/users/$user->id", [
            'name' => 'Updated name',
            'email' => 'test@test.com',
            'password' => 'password',
            'password_confirmation' => 'password'
        ]);

        $this->assertDatabaseHas('users', ['name' => 'Updated name']);
    }

    /**
     * @test
     */
    public function can_delete_user()
    {
        $user = factory(User::class)->create([
            'name' => 'Jone Doe',
            'email' => 'test@test.com',
        ]);


        $this->login();

        $this->delete("/dashboard/users/$user->id");

        $this->assertDatabaseMissing('users', ['name' => $user->name]);
    }

}
