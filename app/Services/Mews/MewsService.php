<?php

namespace App\Services\Mews;

use App\Services\Concerns\BuildBaseRequest;
use App\Services\Concerns\CanSendGetRequest;
use App\Services\Concerns\CanSendPostRequest;
use App\Services\Mews\Repository\ReservationRepository;

class MewsService
{
    use BuildBaseRequest;
    use CanSendGetRequest;
    use CanSendPostRequest;

    public function __construct(
        private readonly string $baseUrl,
        private readonly string $apiClientToken,
        private readonly string $apiAccessToken,
        private readonly string $apiClient,
    ) {
    }

    public function reservation(): ReservationRepository
    {
        return new ReservationRepository(
            service: $this,
        );
    }
}
