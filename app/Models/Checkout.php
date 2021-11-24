<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Checkout extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'camp_id', 'card_number', 'expaired', 'cvc', 'is_paid'
    ];

    // public function setExpiredAttribute($value)
    // {
    //     $this->attributes['expaired'] = date('Y-m-t', strtotime($value));
    // }

    public function Camps()
    {
        return $this->belongsTo(Camps::class, 'camp_id', 'id');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
