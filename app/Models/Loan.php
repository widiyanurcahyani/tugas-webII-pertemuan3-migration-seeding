<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $table = 'loans';

    protected $fillable = [
        'user_npm',
        'loan_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_npm', 'npm');
    }

    public function details()
    {
        return $this->hasMany(LoanDetail::class);
    }
}