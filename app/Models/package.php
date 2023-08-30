<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class package extends Model
{
    public $table = 'tour_and_travelled.packages';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;
    use HasFactory;
}
