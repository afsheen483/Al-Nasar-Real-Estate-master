<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseModel extends Model
{
    use HasFactory;
    protected $table = 'expenses';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'purchase_id',
        'amount',
        'date',
        'is_deleted',
        
    ];
}
