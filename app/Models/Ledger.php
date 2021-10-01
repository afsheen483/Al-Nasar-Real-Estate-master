<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{
    use HasFactory;
    protected $table = 'ledger';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'client_id',
        'balance',
        'credit',
        'debit',
        'description',
        'date',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
        'is_deleted',
        
    ];
}
