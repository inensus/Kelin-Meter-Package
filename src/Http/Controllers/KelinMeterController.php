<?php


namespace Inensus\KelinMeter\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Inensus\KelinMeter\Http\Resources\KelinMeterCollection;
use Inensus\KelinMeter\Http\Resources\KelinResource;
use Inensus\KelinMeter\Services\KelinMeterService;

class KelinMeterController extends Controller
{

    private $meterService;
    public function __construct(KelinMeterService  $meterService)
    {
        $this->meterService=$meterService;
    }

    public function index(Request $request):KelinMeterCollection
    {
      return new KelinMeterCollection($this->meterService->getMeters($request));
    }
    public function sync(): KelinMeterCollection
    {
        return new KelinMeterCollection($this->meterService->sync());
    }

    public function checkSync(): KelinResource
    {
        return new KelinResource($this->meterService->syncCheck());
    }
}