<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoutesAreCorrect extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testHomeIsOK()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function testCanReachCatalogo()
    {
      $response = $this->get('/catalogo');
      $response->assertStatus(200);
    }
}
