<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'resume', 'job_id', 'resume_score', 'location_score', 'final_score'];

    public function jobs(){

        return $this->belongsTo(Jobc::class);
    }

    
}
