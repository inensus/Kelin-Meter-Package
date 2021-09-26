<?php

namespace Inensus\KelinMeter\Http\Controllers;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Routing\Controller;
use Inensus\KelinMeter\Http\Resources\MinutelyConsumptionResource;
use Inensus\KelinMeter\Models\KelinMeter;
use Inensus\KelinMeter\Services\MinutelyConsumptionService;

class KelinMinutelyConsumptionController extends Controller
{
    private MinutelyConsumptionService $minutelyConsumptionService;

    public function __construct(MinutelyConsumptionService $minutelyConsumptionService)
    {
        $this->minutelyConsumptionService = $minutelyConsumptionService;
    }

    public function index(KelinMeter $meter): AnonymousResourceCollection
    {
        $perPage = \request()->get('per_page') ?? 15;
        return MinutelyConsumptionResource::collection($this->minutelyConsumptionService->getDailyData($meter->meter_address,
            $perPage));
    }
}
