<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class  Review extends Model
{
    use HasFactory;

    //fillable -> some properties can be mass assigned
    protected $fillable = ['review', 'rating'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
