<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseModel extends Model
{
    use HasFactory;
    protected $table = 'purchase';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'mauza_id',
        'client_id',
        'date',
        'file',
        'sale_amount',
        'paid_amount',
        'witness_name_1',
        'witness_cnic_1',
        'witness_name_2',
        'witness_cnic_2',
        'description',
        'status',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
        'is_deleted',
        
    ];
}
