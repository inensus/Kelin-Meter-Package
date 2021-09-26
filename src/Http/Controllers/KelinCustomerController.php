<?php

namespace Inensus\KelinMeter\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Routing\Controller;
use Inensus\KelinMeter\Http\Resources\KelinCustomerResource;
use Inensus\KelinMeter\Http\Resources\KelinResource;
use Inensus\KelinMeter\Services\KelinCustomerService;

class KelinCustomerController extends Controller implements IBaseController
{
    private KelinCustomerService $customerService;

    public function __construct(KelinCustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function index(Request $request): AnonymousResourceCollection
    {
        return KelinCustomerResource::collection($this->customerService->getCustomers($request));
    }

    public function sync(): AnonymousResourceCollection
    {
        return KelinCustomerResource::collection($this->customerService->sync());
    }

    public function checkSync(): KelinResource
    {
        return KelinResource::make($this->customerService->syncCheck());
    }

}
