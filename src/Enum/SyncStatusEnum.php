<?php


namespace Inensus\KelinMeter\Enum;


abstract class SyncStatusEnum
{
    const SYNCED = 1;
    const MODIFIED = 2;
    const NOT_REGISTERED_YET = 3;
    const EARLY_REGISTERED = 4;
}
