<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class UserTest extends TestCase
{
    /** @test */
    public function testUsuarioPuedeLoguear()
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

    public function testUsuarioLogueadoPuedeAccederACarrito()
    {
      $user = factory(User::class)->make();
      $response =$this->actingAs($user)->get('/carrito');
      $response->assertSuccessful();
      $response->assertViewIs('carrito');

    }

    public function testUsuarioNoPuedeAccederAAdminPanel()
    {
      $user = factory(User::class)->make();
      $response =$this->actingAs($user)->get('/producto/admin');
      $response->assertRedirect('/');
    }

    //esta puede ser superflua
    public function testVisitantePuedeAccederAHome()
    {
      $response = $this->get('/');
      $response->assertSuccessful();
    }
    public function testVisitanteNoPuedeAccederAAdminPanel()
    {
      $response =$this->get('/producto/admin');
      $response->assertRedirect('/');
    }
    public function testAdminPuedeLoguearse()
    {
      //esto es re falopa
      $this->withoutExceptionHandling();
      $user = User::find(3);
      // dd($user);
      // $user = factory(User::class)->make(
      //   [
      //     'nombre'=>"",
      //     'email' =>'admin@admin.com',
      //     'password'=>bcrypt($password='12121212')
      //   ]
      // );
      // // dd($user);
      // dd(bcrypt('12121212')==$user['password']);
      // dd($user->email);
      // dd($user->password);
      $password='12121212';
      $response = $this->post('/login', [
          'email' => $user->email,
          'password' => $password,
      ]);

      // $response->assertStatus(200);
      $response->assertRedirect('/home');
      // $this->assertAuthenticatedAs('admin');
    }

    /*
    public function testUsuarioPuedeCargarElementoEnCarrito()
    {
      $this->withoutExceptionHandling();
      $user = factory(User::class)->create([
        'password'=>bcrypt($password='pepino1234')
      ]);

      $response = $this->post('/login', [
          'email' => $user->email,
          'password' => $password,
      ]);
    }
    */
}
