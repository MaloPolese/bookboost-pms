<?php

namespace App\Services\V1;

class ReservationQuery
{


    // protected $safeParam = [
    //     'userId' => ['eq'],
    //     'roomId' => ['eq'],
    //     'source' => ['eq'],
    //     'status' => ['eq'],
    //     'segment' => ['eq'],
    // ];

    // protected $columMap = [
    //     'userId' => 'user_id',
    //     'roomId' => 'room_id',
    // ];

    // protected $operatorMap = [
    //     'eq' => '=',
    // ];

    public function getQuery($request)
    {
        $queryItems = [];


        if ($request->query('userId')) {
            $queryItems['user_id'] = $request->query('userId');
        }
        if ($request->query('roomId')) {
            $queryItems['room_id'] = $request->query('roomId');
        }
        if ($request->query('source')) {
            $queryItems['source'] = $request->query('source');
        }
        if ($request->query('status')) {
            $queryItems['status'] = $request->query('status');
        }
        if ($request->query('segment')) {
            $queryItems['segment'] = $request->query('segment');
        }

        return $queryItems;
    }
}
