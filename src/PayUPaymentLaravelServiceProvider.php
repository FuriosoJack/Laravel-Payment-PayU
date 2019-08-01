<?php
namespace FuriosoJack\PayUPaymentLaravel;
use Illuminate\Support\ServiceProvider;

/**
 * Class PayUPaymentLaravelServiceProvider
 * @package FuriosoJack\PayUPaymentLaravel
 * @author Juan Diaz - FuriosoJack <iam@furiosojack.com>
 */
class PayUPaymentLaravelServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/payu_payment.php' => config_path('payu_payment.php'),
            __DIR__ . '/Models/Order.php' => app_path('Order.php'),
        ]);
        $this->mergeConfigFrom(
            __DIR__ . '/../config/payu_payment.php', 'payu_payment'
        );


        
    }
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }

}