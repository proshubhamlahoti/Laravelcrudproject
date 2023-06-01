<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laravelform extends Model
{
    protected $table = 'laravelforms';

    protected $fillable = [
        'name',
        'birthday',
        'gender',
        'state',
        'city',
        'education',
        'profile_photo',
        'skills',
        'certificates',
        'profession',
        'company_name',
        'job_started',
        'business_name',
        'location',
        'email',
        'mobile',
    ];

    protected $casts = [
        'education' => 'array',
        'skills' => 'array',
        'certificates' => 'array',
    ];
}
