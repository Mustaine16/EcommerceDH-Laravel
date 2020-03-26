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

    public function testUsuarioPuedeDesloguearse()
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
      $response =$this->actingAs($user)->post('/logout');
      $response->assertRedirect('/');

    }
    public function testUsuarioNoPuedeAccederAAdminPanel()
    {
      $user = factory(User::class)->make();
      $response =$this->actingAs($user)->get('/producto/admin');
      $response->assertRedirect('/');
    }
    public function testUsuarioPuedeCargarProductoEnCarrito()
    {

        $this->withoutExceptionHandling();
        $user = factory(User::class)->create([
          'password'=>bcrypt($password='pepino1234')
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
        ]);

        $producto = \App\Producto::find(5);
        // dd($producto);
        $id=$producto->id;
        // dd($id);

        $response=$this->call('PUT','/usuario/carrito/addItem',[
          'id_producto'=>$id
        ]);
        $response->assertRedirect('/carrito');


    }

    public function testUsuarioPuedeQuitarProductoDeCarrito()
    {

        $this->withoutExceptionHandling();
        $user = factory(User::class)->create([
          'password'=>bcrypt($password='pepino1234')
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
        ]);

        $producto = \App\Producto::find(5);
        // dd($producto);
        $id=$producto->id;
        // dd($id);

        $response=$this->call('PUT','/usuario/carrito/addItem',[
          'id_producto'=>$id
        ]);
        $response->assertRedirect('/carrito');
        //eliminarlo

        $response=$this->get("/usuario/carrito/dropItem/$id");
        $response->assertRedirect('/carrito');
    }
    public function testUsuarioPuedeRealizarCompra()
    {
      $this->withoutExceptionHandling();
      $user = factory(User::class)->create([
        'password'=>bcrypt($password='pepino1234')
      ]);

      $response = $this->post('/login', [
          'email' => $user->email,
          'password' => $password,
      ]);

      $producto = \App\Producto::find(5);
      // dd($producto);
      $id=$producto->id;
      // dd($id);

      $response=$this->call('PUT','/usuario/carrito/addItem',[
        'id_producto'=>$id
      ]);
      $response->assertRedirect('/carrito');

      //Comprar
      $response = $this->get('/usuario/carrito/comprar');
      $response->assertRedirect('/compras');
      $response = $this->get('/usuario/carrito/finCompra');
      $response->assertSuccessful();


    }

}
