<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParameterUser extends Model
{
    protected $table = 'parameters_users';
    protected $fillable = ['user_id', 'parameter_id', 'value'];
}
