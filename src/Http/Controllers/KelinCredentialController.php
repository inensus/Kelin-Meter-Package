<?php

namespace Inensus\KelinMeter\Http\Controllers;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Routing\Controller;
use Inensus\KelinMeter\Http\Requests\KelinCredentialRequest;
use Inensus\KelinMeter\Http\Resources\KelinCredentialResource;
use Inensus\KelinMeter\Services\KelinCredentialService;

class KelinCredentialController extends Controller
{
    private KelinCredentialService $credentialService;

    public function __construct(KelinCredentialService $credentialService)
    {
        $this->credentialService = $credentialService;
    }

    public function show(): KelinCredentialResource
    {
        return new KelinCredentialResource($this->credentialService->getCredentials());
    }

    public function update(KelinCredentialRequest $request): JsonResource
    {
        return KelinCredentialResource::make(
            $this->credentialService->updateCredentials(
                $request->only(
                    [
                        'id',
                        'username',
                        'password',
                    ]
                )
            )
        );

    }
}
