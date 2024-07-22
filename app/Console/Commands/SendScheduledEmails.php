<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Models\ScheduledEmail;
use App\Mail\InvoiceMail;
use Carbon\Carbon;

class SendScheduledEmails extends Command
{
    protected $signature = 'emails:send-scheduled';
    protected $description = 'Send scheduled emails';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $now = Carbon::now();
        $scheduledEmails = ScheduledEmail::where('send_at', '<=', $now)->get();

        foreach ($scheduledEmails as $scheduledEmail) {
            Mail::to($scheduledEmail->email)->send(new InvoiceMail($scheduledEmail->invoice, $scheduledEmail->pdf_path));
            $scheduledEmail->delete(); // Elimina el registro después de enviar el correo
        }

        return 0;
    }
}

