<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    /*
    public function testCanReachHome()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testCanReachCatalogo()
    {
      $response = $this->get('/catalogo');
      $response->assertStatus(200);
    }

    public function testCanReachCatalogoMarcas()
    {
      $response = $this->get('/catalogo/marcas');
      $response->assertStatus(200);
    }
    public function testCanReachContactoForm()
    {
      $response = $this->get('/contacto');
      $response->assertStatus(200);
    }
    public function testCanReachFaq()
    {
      $response = $this->get('/faq');
      $response->assertStatus(200);
    }
    public function testCanReachLoginForm()
    {
      $response = $this->get('/login');
      $response->assertStatus(200);
    }
    public function testCanReachRegisterForm()
    {
      $response = $this->get('/register');
      $response->assertStatus(200);
    }
*/
}
