<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use App\Services\ClientService;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{

    protected $clientService;

    /**
     * Create a new controller instance.
     *
     * @param ClientService $clientService
     */
    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ClientResource::collection(Client::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreUserRequest $request
     * @return ClientResource
     */
    public function store(StoreUserRequest $request)
    {
        $filteredRequest = $request->only('first_name', 'last_name', 'gender', 'contact_no', 'email');
        return new ClientResource($this->clientService->add($filteredRequest));
    }

    /**
     * Display the specified resource.
     *
     * @param Client $client
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show(Client $client)
    {
        return new ClientResource($client);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserRequest $request
     * @param Client $client
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(UpdateUserRequest $request, Client $client)
    {
        $filteredRequest = $request->only('first_name', 'last_name', 'gender');
        return new ClientResource($this->clientService->edit($filteredRequest, $client));
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
