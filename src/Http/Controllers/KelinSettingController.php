<?php

namespace Inensus\KelinMeter\Http\Controllers;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Routing\Controller;
use Inensus\KelinMeter\Http\Resources\KelinSettingResource;
use Inensus\KelinMeter\Services\KelinSettingService;


class KelinSettingController extends Controller
{
    private KelinSettingService $settingService;

    public function __construct(KelinSettingService $settingService)
    {
        $this->settingService = $settingService;
    }

    public function index(): AnonymousResourceCollection
    {
        return  KelinSettingResource::collection($this->settingService->getSettings());
    }
}
