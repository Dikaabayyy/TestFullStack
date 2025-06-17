<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Houses;
use App\Models\PaymentHistory;

class Residents extends Model
{
    protected $table = 'residents';

    protected $fillable = ['name', 'houses_id', 'gender', 'phone', 'married', 'resident_status', 'img_name', 'slug'];

    protected $primaryKey = 'id';
    public function payment_history()
    {
        return $this->belongsTo(PaymentHistory::class, 'payment_history');
    }

    public function houses()
    {
        return $this->belongsTo(Houses::class, 'houses_id');
    }
}
