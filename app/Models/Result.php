<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    protected $table = 'finalresults';
    protected $fillable = ['userid','correct','wrong','action'];
    
    public function users(){
        return $this->belongsTo(User::class, 'id','userid');
        
    }
}
