<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class debors extends Model
{
    use HasFactory;

    protected $fillable = ['borrowname', 'date_transaction', 'borrows_amount', 'remarks'];
}
