<?php


namespace Inensus\KelinMeter\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Inensus\KelinMeter\Http\Resources\KelinCustomerCollection;
use Inensus\KelinMeter\Http\Resources\KelinResource;
use Inensus\KelinMeter\Services\KelinCustomerService;


class KelinCustomerController extends Controller implements IBaseController
{

    private $customerService;

    public function __construct(KelinCustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function index(Request $request): KelinCustomerCollection
    {
        return new KelinCustomerCollection($this->customerService->getCustomers($request));
    }

    public function sync(): KelinCustomerCollection
    {
        return new KelinCustomerCollection($this->customerService->sync());
    }

    public function checkSync(): KelinResource
    {
        return new KelinResource($this->customerService->syncCheck());
    }

}