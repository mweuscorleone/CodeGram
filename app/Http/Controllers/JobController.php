<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\JobBoard;
use App\Services\ApplicationManager;

class JobController extends Controller
{
    protected $jobBoard;
    protected $appManager;

    public function __construct(JobBoard $jobBoard, ApplicationManager $appManager)
    {
        $this->jobBoard = $jobBoard;
        $this->appManager = $appManager;


    }

    //Add Job

    public function storeJob(Request $request){
        $data = $request->validate([
            'title' => 'required',
            'department' => 'required', 
            'location' => 'required',
            'salary' => 'required|numeric'
        ]);

        return $this->jobBoard->addJob($data);
    }

    //View Jobs

    public function index(){
        return $this->jobBoard->getAllJobs();
    }

    //Apply

    public function apply(Request $request){
        try{
            $data = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'job_id' => 'required|exists:jobs,id',
                'resume' => 'required'
            ]);

            $application = $this->appManager->apply($data);

            return response()->json([
                'message' => 'Application processed successfully!',
                'data' => $application
            ]);
        }
        catch(\Exception $e){
            \Log::error("Applicatioin error: ". $e->getMessage());

            return response()->json([
                'error' => $e->getMessage()], 400);

        }
    }
}
