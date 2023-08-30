<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rating extends Model

{
    public $table = 'tour_and_travelled.rating';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;
    use HasFactory;
}
