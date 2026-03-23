<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = ['name', 'email', 'resume', 'job_id', 'resume_score', 'locaton_score', 'final_score'];

    public function jobs(){

        return $this->belongsTo(Jobc::class);
    }
}
