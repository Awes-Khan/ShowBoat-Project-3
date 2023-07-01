<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormEntry extends Model
{
    use HasFactory;
    protected $fillable = [
        'profile_name',
        'profile_image',
        'email',
        'address',
        'pan_card_number',
        'aadhar_card_number',
    ];
}
