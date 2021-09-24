<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MauzaModel extends Model
{
    use HasFactory;
    protected $table = 'mauzas';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'mauza_name',
        'phase_id',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
        'is_deleted',
        
    ];
}
