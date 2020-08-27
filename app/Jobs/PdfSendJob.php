<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class PdfSendJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user,$detail)
    {
        $this->user=$user;
        $this->detail=$detail;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data['email'] = $detail->Email;
        $data['name'] = $detail->UserName;
        $data['subject'] = 'Checking Mail' ;
        
        //Mail calss is here sending pdf as a mail to the given email.
        Mail::send('pdf.pdf-api',$data,function($message) use ($data,$pdf){
            $message -> to($data['email'],$data['name'])
            ->subject( $data['subject'] )
            ->attachData($pdf -> output() , 'details.pdf');
              
        });
    }
}
