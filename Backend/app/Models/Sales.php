<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $table = 'sales_data';
    protected $primaryKey = 'sales_id';

    protected $fillable = [
        'employee_id',
        'sales'
    ];
}
