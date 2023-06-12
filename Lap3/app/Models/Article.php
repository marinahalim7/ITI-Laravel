<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Article extends Model
{
    use HasFactory;
    protected $fillable=['title','description','rate','user_id'];
    use SoftDeletes;

    function user(){
        return $this->belongsTo(User::class);
    }
}
