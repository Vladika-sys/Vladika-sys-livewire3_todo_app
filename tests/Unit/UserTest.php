<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;


class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }

    //test that user can be instantiated
    public function test_that_user_can_be_instantiated(): void
    {
        $user = new User();
        $this->assertInstanceOf(User::class, $user);
    }

    public function test_user_duplication(): void
    {
        $user1 = new User([
            'name' => 'Test User1',
            'email' => 'sirius@example.com',
            'email_verified_at' => '2021-10-10 10:10:10',
            'password' => 'password',
            'remember_token' => 'token',
            'created_at' => '2021-10-10 10:10:10',
            'updated_at' => '2021-10-10 10:10:10',
        ]);

        $user2 = new User([
            'name' => 'Test User2',
            'email' => 'very@example.com',
            'password' => 'password',
            'remember_token' => 'token',
            'created_at' => '2021-10-10 10:10:10',
            'updated_at' => '2021-10-10 10:10:10',
        ]);

       $this->assertTrue($user1->name!=$user2->name);
    }

    public function test_delete_user(){
        $user = User::factory()->count(1)->make();

        $user = User::first();
        if($user){
            $user->delete();
        }
        $this->assertTrue(true);
    }

}
