<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    protected $fillable = [
        'invoice_id', 'qty', 'description', 'date', 'total'
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
