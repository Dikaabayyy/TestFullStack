<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Payments;
use App\Models\Residents;
use App\Models\Houses;

class PaymentHistory extends Model
{
    protected $table = 'payment_history';

    protected $fillable = ['residents_id', 'security_term', 'security_price', 'security_time', 'cleaning_term', 'cleaning_price', 'cleaning_time', 'slug'];

    protected $primaryKey = 'id';
    public function payment()
    {
        return $this->belongsTo(Payments::class, 'payments_id');
    }

    public function resident()
    {
        return $this->belongsTo(Residents::class, 'residents_id');
    }

    public function house()
{
    return $this->hasOneThrough(
        Houses::class,
        Residents::class,
        'id',
        'id',
        'residents_id',
        'houses_id'
    );
}
}
