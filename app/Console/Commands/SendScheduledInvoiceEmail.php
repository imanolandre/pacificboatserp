<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Invoice;
use App\Mail\InvoiceMail;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class SendScheduledInvoiceEmail extends Command
{
    protected $signature = 'send:scheduled-invoice-email {invoiceId}';
    protected $description = 'Send a scheduled invoice email';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $invoiceId = $this->argument('invoiceId');
        $invoice = Invoice::find($invoiceId);

        if ($invoice && Carbon::parse($invoice->date)->isToday()) {
            $pdfPath = public_path($invoice->file);
            Mail::to($invoice->email)->send(new InvoiceMail($invoice, $pdfPath));
            $this->info("Email sent for Invoice ID: {$invoiceId}");
        } else {
            $this->info("No email sent. Invoice date is not today.");
        }
    }
}
