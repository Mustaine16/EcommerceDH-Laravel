<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Hash;
class LoginTest extends TestCase
{
  // use RefreshDatabase;
  // use DatabaseMigrations;
  public function testUserCanViewALoginForm()
  {
    $response = $this->get('/login');
    $response->assertSuccessful();
    $response->assertViewIs('auth.login');
  }

  public function testUserCannotViewALoginFormWhenAuthenticated()
  {
    $user = factory(User::class)->make();
    $response = $this->actingAs($user)->get('/login');
    $response->assertRedirect('/home');
  }

  public function testUserCanLoginWithCorrectCredentials()
  {
    $this->withoutExceptionHandling();
    $user = factory(User::class)->create([
      'password'=>bcrypt($password='pepino1234')
    ]);

    $response = $this->post('/login', [
        'email' => $user->email,
        'password' => $password,
    ]);

    $response->assertRedirect('/home');
    $this->assertAuthenticatedAs($user);
  }
  public function test_user_cannot_login_with_incorrect_password()
   {
       $user = factory(User::class)->create([
           'password' => bcrypt('i-love-laravel'),
       ]);

       $response = $this->from('/login')->post('/login', [
           'email' => $user->email,
           'password' => 'invalid-password',
       ]);

       $response->assertRedirect('/login');
       $response->assertSessionHasErrors('email');
       $this->assertTrue(session()->hasOldInput('email'));
       $this->assertFalse(session()->hasOldInput('password'));
       $this->assertGuest();
   }
   /*
   public function test_remember_me_functionality()
   {
       $user = factory(User::class)->create([
           'id' => random_int(1, 100),
           'password' => bcrypt($password = 'i-love-laravel'),
       ]);

       $response = $this->post('/login', [
           'email' => $user->email,
           'password' => $password,
           'remember' => 'on',
       ]);

       $response->assertRedirect('/home');
       // cookie assertion goes here
       $this->assertAuthenticatedAs($user);
   }
*/
   public function test_user_receives_an_email_with_a_password_reset_link()
  {
      Notification::fake();

      $user = factory(User::class)->create();

      $response = $this->post('/password/email', [
          'email' => $user->email,
      ]);
      $token = \DB::table('password_resets')->first();

      // assertions go here

Notification::assertSentTo($user, ResetPassword::class, function ($notification, $channels) use ($token) {
    return Hash::check($notification->token, $token->token) === true;
  });
  }

}
