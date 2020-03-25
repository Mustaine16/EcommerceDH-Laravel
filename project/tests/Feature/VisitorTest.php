<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VisitorTest extends TestCase
{
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

}
