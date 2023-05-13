<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionOptions extends Model
{
    use HasFactory;
    protected $table = 'question_options';
    protected $fillable = ['queid','options','correct'];
    
    public function questions(){
        return $this->belongsTo(Question::class, 'id','queid');
    }
}
