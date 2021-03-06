<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $fillable = ['answer', 'user_id','category_id','question_title'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
