<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Marca;
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

  public function testAdminPuedeCargarMarca(){
    $this->withoutExceptionHandling();
    $user = User::find(3);
    $password='12121212';

    $response = $this->post('/login', [
        'email' => $user->email,
        'password' => $password,
    ]);


    //agregar una marca

    //storage falso
    Storage::fake('local');


    $nombre = 'garompalis';
    //crear una imagen falsa
    $imagen = UploadedFile::fake()->image('garompalis.png');
    // dd($imagen);
    $response = $this->json('POST', '/marca/agregar', [
        'imagen' => $imagen,
        'nombre' => $nombre
    ]);

//    Storage::disk('local')->assertExists('/img/productos/logos/');
    $response->assertRedirect('/marca/admin');

    // borrarla
    $marca = Marca::where('nombre','garompalis')->first();

    $response = $this->json('POST',"/marca/$marca->id/borrar");
    $response->assertRedirect('/marca/admin');

  }


  public function testAdminPuedeEliminarMarca(){
    $this->withoutExceptionHandling();
    $user = User::find(3);
    $password='12121212';

    $response = $this->post('/login', [
        'email' => $user->email,
        'password' => $password,
    ]);

    //agregar una marca


    $nombre = 'garompalis';
    //crear una imagen falsa
    $imagen = UploadedFile::fake()->image('garompalis.png');
    // dd($imagen);
    $response = $this->json('POST', '/marca/agregar', [
        'imagen' => $imagen,
        'nombre' => $nombre
    ]);

    //traer la marca

    $marca = Marca::where('nombre','garompalis')->first();
    // dd($marca);

    $response->assertRedirect('/marca/admin');
    $response=$this->get('/marca/admin');
    // dd($marca->id);
    $response = $this->json('POST',"/marca/$marca->id/borrar");
    $response->assertRedirect('/marca/admin');

  }

  public function testAdminPuedeModificarMarca(){
    $this->withoutExceptionHandling();
    $user = User::find(3);
    $password='12121212';

    $response = $this->post('/login', [
        'email' => $user->email,
        'password' => $password,
    ]);

    //agregar una marca


    $nombre = 'garompalis';
    //crear una imagen falsa
    $imagen = UploadedFile::fake()->image('garompalis.png');

    $response = $this->json('POST', '/marca/agregar', [
        'imagen' => $imagen,
        'nombre' => $nombre
    ]);

    //traer la marca
    $marca = Marca::where('nombre','garompalis')->first();
    // mmodificarla
    $nuevoNombre = 'NuevoNombre';
    $nuevaImagen = UploadedFile::fake()->image('nuevaMarca.png');

    $response = $this->json('POST', "/marca/$marca->id/editar", [
        'imagen' => $nuevaImagen,
        'nombre' => $nuevoNombre
    ]);

    $response->assertRedirect('/marca/admin');
    $response=$this->get('/marca/admin');

    // borrarla
    $response = $this->json('POST',"/marca/$marca->id/borrar");
    $response->assertRedirect('/marca/admin');

  }
  //
  // public function testAdminPuedeEliminarMarca(){
  //   $this->withoutExceptionHandling();
  //   $user = User::find(3);
  //   $password='12121212';
  //
  //   $response = $this->post('/login', [
  //       'email' => $user->email,
  //       'password' => $password,
  //   ]);
  //
  //   //agregar una marca
  //
  //
  //   $nombre = 'garompalis';
  //   //crear una imagen falsa
  //   $imagen = UploadedFile::fake()->image('garompalis.png');
  //   // dd($imagen);
  //   $response = $this->json('POST', '/marca/agregar', [
  //       'imagen' => $imagen,
  //       'nombre' => $nombre
  //   ]);
  //
  //   //traer la marca
  //
  //   $marca = Marca::where('nombre','garompalis')->first();
  //   // dd($marca);
  //
  //   $response->assertRedirect('/marca/admin');
  //   $response=$this->get('/marca/admin');
  //   // dd($marca->id);
  //   $response = $this->json('POST',"/marca/$marca->id/borrar");
  //   $response->assertRedirect('/marca/admin');
  //
  // }

  public function testAdminNoPuedeEliminarMarcaConProductoAsociado(){
    $this->withoutExceptionHandling();
    $user = User::find(3);
    $password='12121212';
//login como admin
    $response = $this->post('/login', [
        'email' => $user->email,
        'password' => $password,
    ]);


    // intentar borrar la marca 1 Samsung
    $marca = Marca::find(1);
    // dd($marca);
    //simular la ruta que un humano tomaria
    $response =$this->get('/marca/admin');
    $response->assertViewIs('adminMarcas');
    $response->assertSuccessful();

    $response = $this->post("/marca/$marca->id/borrar");
    $response->assertRedirect('/marca/admin');
  }

    public function testAdminPuedeCargarProducto()
    {
      $this->withoutExceptionHandling();
      $user = User::find(3);
      $password='12121212';

      $response = $this->post('/login', [
          'email' => $user->email,
          'password' => $password,
      ]);


      //agregar una prod

      //storage falso
      Storage::fake('local');


      $producto = factory(Producto::class)->make();
      // dd($producto);
      //crear una imagen falsa
      // $imagen = UploadedFile::fake()->image('garompalis.png');
      // dd($imagen);
      $nombre='nombre falso';
      $response = $this->json('POST', '/producto/agregar', [
          'nombre' => $nombre,
          'procesador' => $producto->procesador,
          'sist_operativo' =>$producto->sist_operativo
      ]);

    //    Storage::disk('local')->assertExists('/img/productos/logos/');
      $response->assertRedirect('/producto/admin');

      // borrarlo
       $producto = Producto::where('nombre',$nombre)->first();

      $response = $this->json('POST',"/producto/$producto->id/borrar");
      $response->assertRedirect('/producto/admin');

    }


        public function testAdminPuedeEliminarProducto()
        {
          $this->withoutExceptionHandling();
          $user = User::find(3);
          $password='12121212';

          $response = $this->post('/login', [
              'email' => $user->email,
              'password' => $password,
          ]);


          //agregar una prod

          //storage falso
          Storage::fake('local');


          $producto = factory(Producto::class)->make();
          $nombre='nombre falso';
          $response = $this->json('POST', '/producto/agregar', [
              'nombre' => $nombre,
              'procesador' => $producto->procesador,
              'sist_operativo' =>$producto->sist_operativo
          ]);


          $response->assertRedirect('/producto/admin');

          // borrarlo
           $producto = Producto::where('nombre',$nombre)->first();

          $response = $this->json('POST',"/producto/$producto->id/borrar");
          $response->assertRedirect('/producto/admin');

        }

    public function testAdminPuedeModificarProducto()
    {
      $this->withoutExceptionHandling();
      $user = User::find(3);
      $password='12121212';

      $response = $this->post('/login', [
          'email' => $user->email,
          'password' => $password,
      ]);


      //agregar una prod

      $producto = factory(Producto::class)->make();
      $nombre='nombre falso';
      //guardarlo
      $response = $this->json('POST', '/producto/agregar', [
          'nombre' => $nombre,
          'procesador' => $producto->procesador,
          'sist_operativo' =>$producto->sist_operativo
      ]);
      // dd(count(Producto::all()));
      $response->assertRedirect('/producto/admin');
      //modificarlo
      $producto = Producto::where('nombre','nombre falso')->first();
      // dd($producto);
      $nuevoNombre = 'nuevo nombre falso';
      $producto->nombre=$nuevoNombre;
      //guardarlo
      $response = $this->json('POST', "/producto/$producto->id/editar", [
          'nombre' => $producto->nombre,
          'procesador' => $producto->procesador,
          'sist_operativo' =>$producto->sist_operativo
      ]);
      //traerlo de nuevo y verificar
      $producto = Producto::where('nombre','nuevo nombre falso')->get();
      // dd(count($producto));
      if($producto = Producto::where('nombre','nuevo nombre falso')->first())
      {
        $this->assertTrue(true);
      }
      else {
        $this->assertTrue(false);
      }
      // dd($producto);
      // borrarlo
      // dd($nuevoNombre);
      $producto = Producto::where('nombre',$nuevoNombre)->first();

      $response = $this->json('POST',"/producto/$producto->id/borrar");
      $response->assertRedirect('/producto/admin');

    }

}
