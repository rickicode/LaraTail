<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{

    use HasFactory, SoftDeletes;

    protected $guarded = [];

    // protected $fillable = [
    //     'firstname', 'lastname', 'code', 'max_users', 'bandwidth_down_kbps', 'bandwidth_up_kbps', 'telepon', 'price', 'expired', 'active'
    // ];


}

