<?php 

namespace App\Services;

use App\Models\Application;
use App\Models\Job;

class ApplicationManager{
    public function apply($data){
        //1. check duplicate

        $exists = Application::where('email', $data['email'])->where('job_id', $data['job_id'])->exists();

        if($exists){
            throw new \Exception("you already applied for this job");

    }

    //2. Get Job

    $job = Job::findOrFail($data['job_id']);

    //3. Resume Score (mock)

    $resumeScore = rand(5, 10);

    //4. Location score

    $locationScore = $this->getLocationScore($job->location);

    //5. Final Score

    $finalScore = $resumeScore + $locationScore;

    //6. Save

    return Application::create([
        
        'name' => $data['name'],
        'email' => $data['email'],
        'job_id' => $data['job_id'],
        'resume' => $data['resume'],
        'resume_score' => $resumeScore,
        'location_score' => $locationScore,
        'final_score' => $finalScore,
    ]);


    }

    private function getLocationScore($location){
        if($location == 'Remote') return 3;
        if($location == 'DAR ES SALAAM') return 2;

        return 1;
    }


}






?>