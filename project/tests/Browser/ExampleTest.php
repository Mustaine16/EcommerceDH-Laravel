<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{

    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testHomeCargaYMuestraBuyit()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                          ->assertSee('Buy it!');
        });
    }
    public function testLinksParaNavegarEnHomeSonVisibles()
    {
      $this->browse(function (Browser $browser){
        $browser->visit('/')
                    ->assertSeeLink('Home')
                    ->assertSeeLink('Catálogo')
                    ->assertSeeLink('Marcas')
                    ->assertSeeLink('F.A.Q')
                    ->assertSeeLink('Contacto')
                    ->assertSeeLink('Login')
                    ->assertSeeLink('Registrate')
                    ->assertSeeLink('Entrá al catálogo');
      });
    }
    public function testClickFunciona()
    {
      $this->browse(function (Browser $browser){
        $browser->visit('/')
                  ->clickLink('Entrá al catálogo');
      });
    }
}
