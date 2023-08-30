<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin_user extends Model
{
    public $table = 'tour_and_travelled.admin_users';
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;

    use HasFactory;
}

