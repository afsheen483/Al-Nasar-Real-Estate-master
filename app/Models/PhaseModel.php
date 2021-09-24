<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhaseModel extends Model
{
    use HasFactory;
    protected $table = 'phases';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'phase_name',
        'location_id',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
        'is_deleted',
        
    ];
}
