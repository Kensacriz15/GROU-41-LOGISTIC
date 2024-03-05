<?php
namespace App\Mail;

use Dompdf\Dompdf;
use Dompdf\PdfWrapper;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvoiceEmail extends Mailable
{

    use Queueable, SerializesModels;

    public $pdf;
    public $emailData;

    public function __construct(PdfWrapper $pdf, $emailData)
{
    $this->pdf = $pdf;
    $this->emailData = $emailData;
}

    public function build()
    {
        return $this->view('emails.invoice_email')
                    ->subject($this->emailData['subject'])
                    ->attachData($this->pdf->output(), 'invoice.pdf', ['mime' => 'application/pdf']);
    }


}
