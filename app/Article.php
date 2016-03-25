<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    protected $fillable = ['name'];
    public function Category(){
        return $this->belongsTo('App\Category');
    }
}
