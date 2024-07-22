<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduledEmail extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_id', 'email', 'pdf_path', 'send_at'
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
