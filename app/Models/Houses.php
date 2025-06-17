<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Residents;

class Houses extends Model
{
    protected $table = 'houses';

    protected $fillable = ['name', 'address', 'resident_status', 'payment_term', 'resident_history', 'slug'];

    protected $primaryKey = 'id';

    public function resident()
    {
        return $this->hasOne(Residents::class, 'houses_id');
    }

}
