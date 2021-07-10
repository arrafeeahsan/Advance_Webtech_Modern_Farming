<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $table = 'forum_table'; //no need if table name plural form of model name
    //protected $primaryKey = 'userId'; // no need if id is directly written rather than userid for the specific column
    public $timestamps = false; //if false then CREATED_AT and UPDATED_AT will not need to be find

    //const CREATED_AT = 'create_time';
    //const UPDATED_AT = 'update_time';
}
