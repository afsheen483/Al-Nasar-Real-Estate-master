<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentModel extends Model
{
    use HasFactory;
    protected $table = 'payments';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'purchase_id',
        'client_id',
        'description',
        'status',
        'type',
        'debit_card',
        'credit_card',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
        'is_deleted',
        
    ];
}
