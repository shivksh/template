<?php

namespace App\Listeners;

use App\Events\PdfSendEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendPdfListener
{
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
     * @param  PdfSendEvent  $event
     * @return void
     */
    public function handle(PdfSendEvent $event)
    {
        PdfSendJob::dispatch($user , $detail)
        ->delay(now()->addSeconds(5));
    }
}
