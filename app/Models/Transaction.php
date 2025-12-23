<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    // Fields that can be mass-assigned
protected $fillable = [
    'user_id',
    'borrower_name',
    'address',
    'contact_number',
    'work',
    'amount',
    'status',
];


    // Relation: who created this transaction
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
