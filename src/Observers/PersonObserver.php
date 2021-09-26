<?php

namespace Inensus\KelinMeter\Observers;

use App\Models\Person\Person;
use Inensus\KelinMeter\Helpers\ApiHelpers;
use Inensus\KelinMeter\Services\KelinCustomerService;


class PersonObserver
{
    private KelinCustomerService $customerService;
    private ApiHelpers $apiHelpers;
    private Person $person;
    private KelinCustomerService $kelinCustomerService;

    public function __construct(
        KelinCustomerService $customerService,
        ApiHelpers $apiHelpers,
        Person $person,
        KelinCustomerService $kelinCustomerService

    ) {
        $this->customerService = $customerService;
        $this->apiHelpers = $apiHelpers;
        $this->person = $person;
        $this->kelinCustomerService = $kelinCustomerService;
    }

    public function updated(Person $person): void
    {
        $kelinCustomer = $this->kelinCustomerService->findMpmCustomer($person->id);

        if (!$kelinCustomer) {
            return;
        }

        $customer = $this->person->newQuery()
            ->with(['addresses' => fn ($q) => $q->where('is_primary', 1)])
            ->where('id', $person->id)->first();

        $this->kelinCustomerService->updateHash($kelinCustomer, $customer);
    }
}
