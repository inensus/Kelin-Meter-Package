<?php


namespace Inensus\KelinMeter\Http\Controllers;


use Illuminate\Routing\Controller;
use Inensus\KelinMeter\Http\Resources\KelinResource;
use Inensus\KelinMeter\Http\Resources\KelinSettingCollection;
use Inensus\KelinMeter\Services\KelinSettingService;


class KelinSettingController extends Controller
{
    private $settingService;

    public function __construct(KelinSettingService $settingService)
    {
        $this->settingService = $settingService;
    }

    public function index():KelinSettingCollection
    {
        return new KelinSettingCollection($this->settingService->getSettings());
    }
}