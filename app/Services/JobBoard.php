<?php
namespace App\Services;

use App\Models\Job;


class JobBoard{
    public function addJob($data){
        return Job::create($data);
    }

    public function getAllJobs(){
        
        return Job::all();

    }
}



?>