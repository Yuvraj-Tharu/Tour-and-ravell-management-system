<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    public $table = 'tour_and_travelled.contact';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;
    use HasFactory;
}
