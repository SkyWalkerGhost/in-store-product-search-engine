<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersStatistic extends Model
{
    use HasFactory;

	// Table name
    protected $table 	= 'production';

    // Primary key
    public $PrimaryKey 	= 'id';

    // timestamps
    public $timestamps  = TRUE;
}
