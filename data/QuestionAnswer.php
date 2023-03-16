<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionAnswer extends Model
{
    use HasFactory;
    protected $table = ('question_answer');

    public function question()
    {
        return $this->hasMany(Question::class, 'question_id');
    }

    public function answer()
    {
        return $this->hasMany(Answer::class, 'answer_id');
    }
}
