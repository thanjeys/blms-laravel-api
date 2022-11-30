<?php

namespace App\Http\Controllers\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreEmployeeRequest;
use App\Models\CoordinatorRelation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
    {

        $inputData = $request->validated();
        $inputData['password'] = bcrypt($inputData['password']);

        $user = User::create($inputData);
        $user->products()->attach($inputData['products']);

        if ($user->role_id == 1 | $user->role_id == 2) {
            CoordinatorRelation::create([
                'co_user_id' => $inputData['coordinator'],
                'rel_user_id' => $user->id,
                'rel_type' => ($user->role_id == 1) ? 'telecaller' : 'backend',
            ]);
        }

        // Add Co-Ordinator relationship
        return response()->json(['message' => 'Employee Saved Successfully'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
