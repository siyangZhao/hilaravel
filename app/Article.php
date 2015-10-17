<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $tables = 'articles';

    protected $fillable = ['title','content','user_id','node_id','created_at','updated_at'];
}
