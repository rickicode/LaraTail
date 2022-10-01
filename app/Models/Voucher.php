<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'machine_id', 'batch_number', 'type', 'code', 'minutes', 'allow_pause', 'generated_by', 'max_users', 'price', 'expiration_hours', 'bandwidth_down_kbps', 'bandwidth_up_kbps'
    ];


}



class Session extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'sessions';


}

class Device_session extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'device_sessions';


}
