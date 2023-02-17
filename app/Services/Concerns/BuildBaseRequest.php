<?php

namespace App\Services\Concerns;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

trait BuildBaseRequest
{
    public function withBaseUrl(): PendingRequest
    {
        return Http::baseUrl(
            url: $this->baseUrl,
        )->timeout(
            seconds: 15,
        );
    }
}
