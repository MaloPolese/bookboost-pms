<?php

namespace App\Services\Mews\Repository;

use App\Services\Mews\MewsService;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class ReservationRepository
{
    public function __construct(
        private readonly MewsService $service,
    ) {
    }

    public function list(array $data = []): Response
    {
        return $this->service->post(
            request: $this->service->withBaseUrl(),
            url: "api/connector/v1/reservations/getAll",
            payload: $data,
        );
    }
}
