<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_account extends Model
{
    public $table = 'tour_and_travelled.user_accounts';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;
    use HasFactory;

}
