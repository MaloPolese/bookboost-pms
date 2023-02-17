<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreReservationRequest;
use App\Http\Requests\V1\UpdateReservationRequest;
use App\Http\Resources\V1\Reservation\ReservationCollection;
use App\Http\Resources\V1\Reservation\ReservationResource;
use App\Models\Reservation;
use App\Services\V1\ReservationQuery;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $filter = new ReservationQuery();
        $queryItems = $filter->getQuery($request);

        $reservations = Reservation::where($queryItems)->get();

        if ($request->query('eager')) {
            $reservations->load(['user', 'room']);
        }

        return new ReservationCollection($reservations);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReservationRequest $request)
    {
        return new ReservationResource(Reservation::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        return new ReservationResource(($reservation->load(['user', 'room'])));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        $reservation->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        // soft delete
        $reservation->delete();
    }
}
