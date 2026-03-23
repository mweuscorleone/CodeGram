<?php 

namespace App\Services;

use App\Models\Application;
use App\Models\Job;

class ApplicationManager{
    public function apply($data){
        //check duplicate

        $exist = Application::where('email', $data['email'])->where('job_id', $data['job_id'])->exists();
    }
}






?>