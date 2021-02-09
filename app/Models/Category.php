<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

	// Table name
    protected $table = 'production_category';

    // Primary key
    public $PrimaryKey = 'id';

    // timestamps
    public $timestamps  = TRUE;
}
