## Auto Payments Using Laravel Dusk

Okay, so Laravel dusk is pretty amazing. The other day I was making my utility payment online which I encountered my monthly frustration of **"Why don't these fools have an autopayment option."** If only I could emulate my steps to making the payment. Then it dawned on me&mdash;I could use Laravel Dusk!

It took me about 15 minutes to write the browser test that submits the payment (see [UtilityPayment.php](https://github.com/JordanDalton/LaravelDuskAutoPay/blob/master/tests/Browser/Pages/UtilityPayment.php)).

The next step was to setup my Mac to run `php artisan dusk`. To do this we will use Automator which comes with all Macs

Step #1: Open Automator, Select "Application"

![alt tag](https://raw.githubusercontent.com/jordandalton/LaravelDuskAutoPay/master/Automator-Step1.png)

Step #2: Select "Run Apple Script"

![alt tag](https://raw.githubusercontent.com/jordandalton/LaravelDuskAutoPay/master/Automator-Step2.png)

Step #3: Enter the following code, then save the application. I called mine "Pay."

```
on run {input, parameters}
	tell application "Terminal"
		activate
		do script with command "cd ~/Code/Projects/dusk && php artisan dusk"
	end tell
end run
```


![alt tag](https://raw.githubusercontent.com/jordandalton/LaravelDuskAutoPay/master/Automator-Step3.png)

Step #4: Create calendar alarm

![alt tag](https://raw.githubusercontent.com/jordandalton/LaravelDuskAutoPay/master/Automator-Step4.png)

Step #5: Select "Launch Application"

![alt tag](https://raw.githubusercontent.com/jordandalton/LaravelDuskAutoPay/master/Automator-Step5.png)

Step #6: Select the the Pay application we created.

![alt tag](https://raw.githubusercontent.com/jordandalton/LaravelDuskAutoPay/master/Automator-Step6.png)

Step #7: Go into your calendar and adjust your calendar event to match.

![alt tag](https://raw.githubusercontent.com/jordandalton/LaravelDuskAutoPay/master/Automator-Step7.png)

That's it!.
