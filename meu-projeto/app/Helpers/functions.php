<?php

use App\ENUMS\SuporteStatus;

if(!function_exists('getStatusSuporte')){

    function getStatusSuporte(string $status): string{
        return SuporteStatus::fromValue(($status));
    }
}