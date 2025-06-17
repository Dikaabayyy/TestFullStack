<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PaymentHistory;

class Payments extends Model
{
    protected $table = 'payments';

    protected $primaryKey = 'id';
    public function payment_history()
    {
        return $this->belongsTo(PaymentHistory::class, 'payment_history', 'id' );
    }
}
