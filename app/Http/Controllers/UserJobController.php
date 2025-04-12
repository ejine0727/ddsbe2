<?php

namespace App\Http\Controllers;

use App\Models\UserJob; // Your model
use Illuminate\Http\Request; // For handling HTTP requests
use App\Traits\ApiResponser; // Custom trait for standardized responses
use Illuminate\Http\Response;
use App\Models\User;

class UserJobController extends Controller
{
    use ApiResponser;

    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Return the list of user jobs
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userjobs = UserJob::all();
        return $this->successResponse($userjobs);
    }

    public function store(Request $request)
{
    $rules = [
        'username' => 'required',
        'password' => 'required',
        'gender' => 'required',
        'jobid' => 'required|integer',
    ];

    $this->validate($request, $rules);

    $userjob = UserJob::create($request->all());

    return $this->successResponse($userjob, 201);
}


     // Update user
     public function update(Request $request, $id)
     {
         $rules = [
             'username' => 'max:20',
             'password' => 'max:20',
             'gender'   => 'in:Male,Female',
             'jobid'    => 'required|numeric|min:1|not_in:0',
         ];
 
         $this->validate($request, $rules);
 
         // Validate jobid exists
         $jobExists = UserJob::find($request->jobid);
         if (!$jobExists) {
             return $this->errorResponse('The provided jobid does not exist.', Response::HTTP_NOT_FOUND);
         }
 
         $user = User::findOrFail($id);
         $user->fill($request->all());
 
         if ($user->isClean()) {
             return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
         }
 
         $user->save();
         return $this->successResponse($user);
     }

    /**
     * Get one user job by ID
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userjob = UserJob::findOrFail($id);
        return $this->successResponse($userjob);
    }
}
