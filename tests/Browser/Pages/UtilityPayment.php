<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;

class UtilityPayment extends Page
{
    public function url()
    {
        return 'https://www.municipalonlinepayments.com';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @return void
     */
    public function assert(Browser $browser)
    {
        \Log::info('Attempting to pay utility bill.');

        $day = \Carbon\Carbon::now()->day;

        // They always post the bill on the 18th.
        if($day > 18 && $day < 28){

            $browser->visit('robinsontx/utilities/accounts/detail/03-4134-01') // I purposely put the direct URI that way after I log in I will get redirected to this page.
                    ->assertSee('Login') // Making sure the login form is showing.
                    ->assertSee('Email')
                    ->type('UserName', '{REDACTED}') //
                    ->type('Password', '{REDACTED}')
                    ->press('Login') // Submit the form
                    ->assertPathIs('/robinsontx/utilities/accounts/detail/03-4134-01') // Making sure the redirect went correctly.
                    ->assertSee('{REDACTED}') // Confirmed my address is showing
                    ->press('Make a Payment') // Should redirect me to the page to submit my payment amount.
                    ->press('Continue') // They prepopulate the payment amount so I all I need to do is continue.
                    ->assertPathIs('/robinsontx/utilities/payment/submit') // Make sure I'm on the page where it all goes down ;)
                    ->assertSee('Submit Payment') // Making sure the button I'm targeting is visible.
                    ->assertSee('{REDACTED}') // Make sure the last 4 of my card is showing.
                    ->type('cvv', '{REDACTED}') // Put my CC security code.
                    ->press('Submit Payment') // Pay the fools
                    ->assertSee('Confirmation Number') // This is how I know it was successful.
                    ->screenshot('UtilityPayment'); // Take a screenshot.
        }
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@element' => '#selector',
        ];
    }
}