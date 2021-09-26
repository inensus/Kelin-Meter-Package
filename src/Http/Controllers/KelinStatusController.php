<?php

namespace Inensus\KelinMeter\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Inensus\KelinMeter\Http\Resources\KelinMeterStatusResource;
use Inensus\KelinMeter\Http\Resources\KelinResource;
use Inensus\KelinMeter\Models\KelinMeter;
use Inensus\KelinMeter\Services\KelinMeterStatusService;

class KelinStatusController extends Controller
{
    private KelinMeterStatusService $kelinMeterStatusService;
    public function __construct(KelinMeterStatusService $kelinMeterStatusService)
    {
        $this->kelinMeterStatusService=$kelinMeterStatusService;
    }

    public function show(KelinMeter $meter): KelinMeterStatusResource
    {
        return KelinMeterStatusResource::make($this->kelinMeterStatusService->getStatusOfMeter($meter));
    }
    public function update(Request $request,KelinMeter $meter): KelinResource
    {
        return KelinResource::make($this->kelinMeterStatusService->changeStatusOfMeter($meter->meter_address,$request->input('status')));
    }
}
