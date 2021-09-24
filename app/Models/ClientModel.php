<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientModel extends Model
{
    use HasFactory;
    protected $table = 'clients';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'client_name',
        'contact',
        'cnic',
        'date',
        'location_id',
        'open_balance',
        'type',
        'address',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
        'is_deleted',
        
    ];
}
