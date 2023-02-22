<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public $table = 'employees';

    public $fillable = [
        'first_name',
        'last_name',    
        'company_id',
        'email',
        'phone'
    ];

    public static $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'company_id' => 'required',
        'email' => 'email|nullable',
        'phone' => 'nullable',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
