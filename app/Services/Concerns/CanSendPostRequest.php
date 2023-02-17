<?php

namespace App\Services\Concerns;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;

trait CanSendPostRequest
{
    public function post(PendingRequest $request, string $url, array $payload = []): Response
    {
        return $request->post(
            url: $url,
            data: [
                "ClientToken" => $this->apiClientToken,
                "AccessToken" => $this->apiAccessToken,
                "Client" => $this->apiClient,
                ...$payload,
            ],
        );
    }
}
