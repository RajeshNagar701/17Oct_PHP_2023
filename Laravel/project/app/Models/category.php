<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{


    // if you want custome table name or custome primary key 

    //protected $table = 'my_categories';
    //protected $primaryKey = 'cate_id';

    use HasFactory;
}
