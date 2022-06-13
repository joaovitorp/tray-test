<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SaleReportEmail extends Mailable
{
    use Queueable;
    use SerializesModels;

    public array $sellerWithSales = [];
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $sellerWithSales)
    {
        $this->sellerWithSales = $sellerWithSales;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.sale-report-email', [
            'sellerWithSales' => $this->sellerWithSales
        ]);
    }
}
