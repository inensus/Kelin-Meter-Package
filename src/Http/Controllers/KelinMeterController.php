<?php

namespace Inensus\KelinMeter\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Routing\Controller;
use Inensus\KelinMeter\Http\Resources\KelinMeterResource;
use Inensus\KelinMeter\Http\Resources\KelinResource;
use Inensus\KelinMeter\Services\KelinMeterService;

class KelinMeterController extends Controller
{
    private KelinMeterService $meterService;
    public function __construct(KelinMeterService  $meterService)
    {
        $this->meterService=$meterService;
    }

    public function index(Request $request): AnonymousResourceCollection
    {
      return  KelinMeterResource::collection($this->meterService->getMeters($request));
    }
    public function sync(): AnonymousResourceCollection
    {
        return  KelinMeterResource::collection($this->meterService->sync());

    }

    public function checkSync(): KelinResource
    {
        return new KelinResource($this->meterService->syncCheck());
    }
}
