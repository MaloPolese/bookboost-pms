<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreRoomRequest;
use App\Http\Requests\V1\UpdateRoomRequest;
use App\Http\Resources\V1\Room\RoomCollection;
use App\Http\Resources\V1\Room\RoomResource;
use App\Models\Room;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new RoomCollection(Room::paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoomRequest $request)
    {
        return new RoomResource(Room::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        return new RoomResource(($room));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoomRequest $request, Room $room)
    {
        $room->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        $room->delete();
    }
}
