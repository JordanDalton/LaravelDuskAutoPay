<?php

namespace Tests\Browser;

use Tests\Browser\Pages\Users;
use Tests\Browser\Pages\UtilityPayment;
use Tests\DuskTestCase;
use Laravel\Dusk\Chrome;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function ($browser) {
            $browser->visit(new UtilityPayment());
        });
    }
}
