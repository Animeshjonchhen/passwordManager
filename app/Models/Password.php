<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Password extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'password',
        'url',
        'remarks',
        'user_id',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(category::class,'category_id');
    }
    
}
