<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Producto;

class AdminTest extends TestCase
{

  public function testAdminPuedeLoguearse()
  {
    //esto es re falopa
    //porque no puedo eliminar el admind de la tabla
    //y crearlo cuando fuera necesario
    $this->withoutExceptionHandling();
    $user = User::find(3);
    $password='12121212';

    $response = $this->post('/login', [
        'email' => $user->email,
        'password' => $password,
    ]);


    $response->assertRedirect('/home');
  }
  public function testAdminPuedeDesloguearse()
  {
    //esto es re falopa
    //porque no puedo eliminar el admind de la tabla
    //y crearlo cuando fuera necesario
    $this->withoutExceptionHandling();
    $user = User::find(3);
    $password='12121212';

    $response = $this->post('/login', [
        'email' => $user->email,
        'password' => $password,
    ]);

    $response->assertRedirect('/home');
    $response =$this->actingAs($user)->post('/logout');
    $response->assertRedirect('/');

  }

  public function testAdminPuedeAccederAAdminProductosPanel()
  {
    //esto es re falopa
    //porque no puedo eliminar el admind de la tabla
    //y crearlo cuando fuera necesario
    $this->withoutExceptionHandling();
    $user = User::find(3);
    $password='12121212';

    $response = $this->post('/login', [
        'email' => $user->email,
        'password' => $password,
    ]);

    $response =$this->get('/producto/admin');
    $response->assertViewIs('adminProductos');
    $response->assertSuccessful();
  }
  public function testAdminPuedeAccederAAdminMarcasPanel()
  {
    //esto es re falopa
    //porque no puedo eliminar el admind de la tabla
    //y crearlo cuando fuera necesario
    $this->withoutExceptionHandling();
    $user = User::find(3);
    $password='12121212';

    $response = $this->post('/login', [
        'email' => $user->email,
        'password' => $password,
    ]);

    $response =$this->get('/marca/admin');
    $response->assertViewIs('adminMarcas');
    $response->assertSuccessful();
  }

}
