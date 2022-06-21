<?php

namespace App\Listeners;

use App\Events\ProductUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
class SendNotificationForAdmin implements ShouldQueue
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
    public function handle(ProductUpdated $event)
    {
        sleep(12);
        $params = '1290129';
        $array = json_decode($params, true);
        $array['product_id'];
        info('send message to admin: product_id = ' . $event->product->id);
    }
}
