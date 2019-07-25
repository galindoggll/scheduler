<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\StaffResource;
use App\Models\Staff;
use App\Services\StaffService;
use App\Http\Controllers\Controller;

class StaffController extends Controller
{

    protected $staffService;

    /**
     * Create a new controller instance.
     *
     * @param StaffService $staffService
     */
    public function __construct(StaffService $staffService)
    {
        $this->staffService = $staffService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return StaffResource::collection(Staff::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreUserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $filteredRequest = $request->only('first_name', 'last_name', 'gender', 'contact_no', 'email', 'type');
        return new StaffResource($this->staffService->add($filteredRequest));
    }

    /**
     * Display the specified resource.
     *
     * @param Staff $staff
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show(Staff $staff)
    {
        return new StaffResource($staff);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserRequest $request
     * @param Staff $staff
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(UpdateUserRequest $request, Staff $staff)
    {
        $filteredRequest = $request->only('first_name', 'last_name', 'gender');
        return new StaffResource($this->clientService->edit($filteredRequest, $staff));
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
