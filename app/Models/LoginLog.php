<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginLog extends Model
{
    use HasFactory;

    

    protected $fillable = [
        'admin_id',
        'login_time',
        'ip_address',
        'user_agent',
    ];

    public $timestamps = false;

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
};


