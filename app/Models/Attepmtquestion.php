<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attepmtquestion extends Model
{
    use HasFactory;
    protected $table = 'attepmtquestions';
    protected $fillable = ['userid','queid','optid','score','action'];
    
    public function users(){
        return $this->belongsTo(User::class, 'id','userid');
        
    }
    public function questions(){
        return $this->belongsTo(Question::class, 'id','queid');
        
    }
    public function options(){
        return $this->belongsTo(QuestionOptions::class, 'id','optid');
        
    }
}
