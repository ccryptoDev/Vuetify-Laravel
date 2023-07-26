<?php
namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class VueTest extends DuskTestCase
{
    public function testHomeComponent()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')->assertTitle('Laravel');
        });
    }

    public function testLoginComponent()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')->assertPresent('button');
        });
    }

    public function testSignupComponent()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/signup')->assertPresent('button');
        });
    }
}