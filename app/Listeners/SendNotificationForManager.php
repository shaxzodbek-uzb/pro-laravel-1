<?php

namespace App\Listeners;

use App\Events\ProductCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendNotificationForManager implements ShouldQueue
{
    use InteractsWithQueue;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\ProductUpdated  $event
     * @return void
     */
    public function handle(ProductCreated $event)
    {
        sleep(12);
        $params = '1290129';
        $array = json_decode($params, true);
        $array['product_id'];
        info('send message to manager: product_id = ' . $event->product->id);
    }
}
