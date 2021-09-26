<?php

namespace Inensus\KelinMeter\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Inensus\KelinMeter\Http\Resources\KelinResource;
use Inensus\KelinMeter\Services\KelinSyncSettingService;

class KelinSyncSettingController extends Controller
{
    private KelinSyncSettingService $syncSettingService;

    public function __construct(KelinSyncSettingService $syncSettingService)
    {
        $this->syncSettingService = $syncSettingService;
    }

    public function update(Request $request): KelinResource
    {

        return  KelinResource::make($this->syncSettingService->updateSyncSettings($request->all()));
    }
}
